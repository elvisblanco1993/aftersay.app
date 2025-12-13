<?php

namespace App\Http\Controllers;

use App\Models\EmailOpen;
use App\Models\SequenceLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class EmailPixelController extends Controller
{
    public function show(Request $request, string $token)
    {
        $message = SequenceLog::where('token', $token)->first();

        if (! $message) {
            return response('', 404);
        }

        // Dedupe: once per message per UA+IP per 12h
        $fingerprint = sha1(
            ($request->header('User-Agent') ?? '').'|'.$request->ip()
        );

        $dedupeKey = "email:{$message->id}:{$fingerprint}";

        if (Cache::add($dedupeKey, true, now()->addHours(12))) {
            $provider = $this->detectProvider($request->header('User-Agent'));

            EmailOpen::create([
                'sequence_log_id' => $message->id,
                'opened_at' => now(),
                'user_agent' => Str::limit((string) $request->header('User-Agent'), 500),
                'ip_hash' => $request->ip() ? hash('sha256', $request->ip()) : null,
                'provider' => $provider,
            ]);

            $message->increment('open_count');

            if (! $message->first_opened_at) {
                $message->update(['first_opened_at' => now()]);
            }
        }

        return $this->transparentGif();
    }

    protected function transparentGif()
    {
        $gif = base64_decode(
            'R0lGODlhAQABAPAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=='
        );

        return response($gif, 200, [
            'Content-Type' => 'image/gif',
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
        ]);
    }

    protected function detectProvider(?string $ua): string
    {
        $ua = strtolower($ua ?? '');

        return match (true) {
            str_contains($ua, 'gmail') => 'gmail',
            str_contains($ua, 'googleimageproxy') => 'gmail',
            str_contains($ua, 'outlook') => 'outlook',
            str_contains($ua, 'applemail') => 'apple',
            default => 'unknown',
        };
    }
}
