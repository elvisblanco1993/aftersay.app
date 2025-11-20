<?php

use Illuminate\Support\Facades\Response;

if (! function_exists('download_contacts_sample_csv')) {
    function download_contacts_sample_csv()
    {
        $filename = 'contacts.csv';

        $callback = function () {
            $output = fopen('php://output', 'w');

            // Header row
            fputcsv($output, ['first_name', 'last_name', 'email', 'phone']);

            // Sample rows
            fputcsv($output, ['John', 'Doe', 'john.doe@example.com', '555-123-4567']);
            fputcsv($output, ['Jane', 'Smith', 'jane.smith@example.com', '555-987-6543']);
            fputcsv($output, ['Carlos', 'Perez', 'carlos.perez@example.com', '555-222-7788']);

            fclose($output);
        };

        return Response::streamDownload($callback, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }
}
