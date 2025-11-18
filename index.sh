#!/bin/sh

# This script rebuilds the search engine indexes.
# Flush
php artisan scout:flush "\App\Models\Contact";
php artisan scout:flush "\App\Models\Template";
php artisan scout:flush "\App\Models\Workflow";
php artisan scout:flush "\App\Models\Testimonial";
php artisan scout:flush "\App\Models\Concern";
php artisan scout:flush "\App\Models\Sequence";

# Import
php artisan scout:import "\App\Models\Contact";
php artisan scout:import "\App\Models\Template";
php artisan scout:import "\App\Models\Workflow";
php artisan scout:import "\App\Models\Testimonial";
php artisan scout:import "\App\Models\Concern";
php artisan scout:import "\App\Models\Sequence";

# Index
php artisan scout:index "\App\Models\Contact";
php artisan scout:index "\App\Models\Template";
php artisan scout:index "\App\Models\Workflow";
php artisan scout:index "\App\Models\Testimonial";
php artisan scout:index "\App\Models\Concern";
php artisan scout:index "\App\Models\Sequence";
