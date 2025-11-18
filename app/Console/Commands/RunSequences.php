<?php

namespace App\Console\Commands;

use App\Enums\SequenceStatus;
use App\Jobs\ProcessSequenceStep;
use App\Models\Sequence;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class RunSequences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sequence:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Processes any running Workflow Instances.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $now = Carbon::now()->startOfMinute();
            $nextMinute = (clone $now)->addMinute();
            Sequence::where('status', SequenceStatus::Running->value)
                ->whereBetween('next_run_at', [$now, $nextMinute])
                ->chunkById(10, function ($sequences) {
                    ProcessSequenceStep::dispatch($sequences->pluck('id')->toArray());
                });

            return Command::SUCCESS;
        } catch (\Throwable $th) {
            Log::error('Error in RunSequences command: '.$th->getMessage(), [
                'trace' => $th->getTraceAsString(),
            ]);

            return Command::FAILURE;
        }
    }
}
