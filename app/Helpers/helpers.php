<?php

use Illuminate\Support\Facades\Response;

if (! function_exists('download_contacts_sample_csv')) {
    function download_contacts_sample_csv()
    {
        $filename = 'contacts.csv';

        $callback = function () {
            $output = fopen('php://output', 'w');

            // Header row
            fputcsv($output, ['first_name', 'last_name', 'email']);

            // Sample rows
            fputcsv($output, ['John', 'Doe', 'john.doe@example.com']);
            fputcsv($output, ['Jane', 'Smith', 'jane.smith@example.com']);
            fputcsv($output, ['Carlos', 'Perez', 'carlos.perez@example.com']);

            fclose($output);
        };

        return Response::streamDownload($callback, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }
}
