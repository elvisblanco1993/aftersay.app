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

    public function value(): string
    {
        return match ($this) {
            self::SendEmail => 'send_email',
            self::SendSms => 'send_sms',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::SendEmail => 'mail',
            self::SendSms => 'message-circle-heart',
        };
    }
}
