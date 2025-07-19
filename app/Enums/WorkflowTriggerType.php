<?php

namespace App\Enums;

enum WorkflowTriggerType: string
{
    case Manual = 'manual';
    case InteractionCompleted = 'event:interaction_completed';
}
