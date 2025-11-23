<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('sequence:run')->everyMinute();
Schedule::command('backup:run')->everyOddHour(); // Every two hours
