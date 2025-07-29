<?php

namespace App\Notifications;

use App\Models\WorkflowStep;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;
use Twilio\Exceptions\TwilioException;

class SendMessage extends Notification
{
    use Queueable;

    public string $channel;

    /**
     * Create a new notification instance.
     */
    public function __construct(public WorkflowStep $step, string $channel = 'mail')
    {
        $this->channel = $channel === 'twilio' ? TwilioChannel::class : 'mail';
    }

    public function via(object $notifiable): array
    {
        return [$this->channel];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $subject = $this->step->template_id ? $this->step->template->subject : 'New email from '.$this->step?->workflow?->tenant?->name;
        $message = $this->step->template_id ? $this->step->template->body : $this->step->custom_message;

        return (new MailMessage)
            ->subject($subject)
            ->markdown('mail.send-message', [
                'message' => $message,
                'url' => route('review-page.show', ['slug' => $this->step?->workflow?->tenant?->page->slug]),
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toTwilio(object $notifiable)
    {
        try {
            $message = $this->step->template_id ? $this->step->template->body : $this->step->custom_message;
            $sms = new TwilioSmsMessage;

            return $sms->content($message);
        } catch (TwilioException $th) {
            Log::error($th);
        }
    }
}
