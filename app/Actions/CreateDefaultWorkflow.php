<?php

namespace App\Actions;

use App\Enums\WorkflowActionType;
use App\Enums\WorkflowTriggerType;
use App\Models\Template;
use App\Models\Tenant;
use App\Models\User;
use App\Models\WorkflowStep;

class CreateDefaultWorkflow
{
    public function __invoke(User $user)
    {
        $tenant = Tenant::where('user_id', $user->current_tenant_id)->firstOrFail();

        $workflow = $tenant->workflows()->create([
            'trigger' => WorkflowTriggerType::Manual->value,
            'name' => 'Client Feedback Flow',
        ]);

        $order = 1;
        foreach (config('internal.review_workflow') as $template) {
            $templateName = config('internal.review_templates.'.$template['name'].'.name');
            WorkflowStep::create([
                'workflow_id' => $workflow->id,
                'order' => $order,
                'action' => WorkflowActionType::SendEmail->value,
                'delay' => $template['delay'],
                'delay_unit' => $template['delay_unit'],
                'template_id' => Template::where('name', $templateName)?->first()?->id ?? null,
            ]);
            $order++;
        }
    }
}
