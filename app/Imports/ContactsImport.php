<?php

namespace App\Imports;

use App\Models\Contact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

use function Symfony\Component\Clock\now;

// Note: ToCollection must be used with WithChunkReading
class ContactsImport implements ShouldQueue, SkipsOnFailure, ToCollection, WithChunkReading, WithHeadingRow, WithValidation
{
    use Importable, SkipsFailures;

    private $successfulInserts = 0;

    private $tenantId;

    private $created_at;

    private $updated_at;

    public function __construct(int $tenantId)
    {
        $this->tenantId = $tenantId;
        $this->created_at = now();
        $this->updated_at = $this->created_at;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function collection(Collection $rows)
    {
        // This method will now be called multiple times, once for each chunk of 1000 rows.
        foreach ($rows as $row) {
            DB::table('contacts')->upsert([
                'tenant_id' => $this->tenantId,
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'email' => $row['email'],
                'phone' => $row['phone'] ?? null,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ], [
                'tenant_id' => $this->tenantId,
                'email' => $row['email'],
            ]);
            $this->successfulInserts++;
        }

        // Index all contacts
        Contact::where('tenant_id', $this->tenantId)->searchable();
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
        ];
    }

    public function getSuccessfulInsertsCount(): int
    {
        return $this->successfulInserts;
    }

    public function getFailedInsertsCount(): int
    {
        return $this->failures()->count();
    }
}
