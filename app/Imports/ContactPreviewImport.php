<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithLimit;

class ContactPreviewImport implements ToCollection, WithHeadingRow, WithLimit
{
    public function collection(Collection $collection) {}

    /**
     * Set the maximum number of rows to read.
     */
    public function limit(): int
    {
        // Only read the first 5 data rows (in addition to the header row)
        return 5;
    }
}
