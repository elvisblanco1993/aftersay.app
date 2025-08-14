<?php

namespace App\Notifications;

use App\Models\Contact;
use App\Models\WorkflowStep;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Uri;

class SendMessage extends Notification
{
    use Queueable;

    public string $channel;

    /**
     * Create a new notification instance.
     */
    public function __construct(public WorkflowStep $step, public Contact $contact, public string $content)
    {
        $this->channel = 'mail';
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

        $signature = null; // Maybe we can get this from the tenant settings.

        return (new MailMessage)
            ->subject($subject)
            ->markdown('mail.send-message', [
                'message' => $this->content,
                'signature' => $signature,
                'url' => Uri::of(route('review-page.show', ['slug' => $this->step?->workflow?->tenant?->page->slug]))
                    ->withQuery([
                        'ref' => $this->contact->ulid,
                    ]),
            ]);
    }
}
