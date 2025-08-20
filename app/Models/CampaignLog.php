<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignLog extends Model
{
    protected $fillable = [
        'campaign_id',
        'workflow_step_id',
        'action',
        'details',
        'status',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function step()
    {
        return $this->belongsTo(WorkflowStep::class);
    }
}
