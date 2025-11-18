<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('sequence:run')->everyMinute();
