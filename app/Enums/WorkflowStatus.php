<?php

namespace App\Enums;

enum WorkflowStatus: string
{
    case Running = 'running';
    case Paused = 'paused';
    case Completed = 'completed';
    case Failed = 'failed';
}
