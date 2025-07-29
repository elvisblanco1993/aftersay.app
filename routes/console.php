<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('campaign:run')->everyMinute();
