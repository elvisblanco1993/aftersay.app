<?php

namespace App\Enums;

enum WorkflowActionType: string
{
    case SendEmail = 'send_email';
    case SendSms = 'send_sms';

    public function label(): string
    {
        return match ($this) {
            self::SendEmail => 'Send Email',
            self::SendSms => 'Send SMS',
        };
    }
}
