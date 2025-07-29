#!/bin/sh

# This script rebuilds the search engine indexes.
# Flush
php artisan scout:flush "\App\Models\Contact";
# php artisan scout:flush "\App\Models\Workflow";

# Import
php artisan scout:import "\App\Models\Contact";
# php artisan scout:import "\App\Models\Workflow";

# Index
php artisan scout:index "\App\Models\Contact";
# php artisan scout:index "\App\Models\Workflow";
