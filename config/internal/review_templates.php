<?php

return [

    // Email templates
    'initial_request' => [
        'name' => 'Email: Initial Feedback Request',
        'type' => 'email',
        'subject' => 'Quick favor — how did we do?',
        'body' => 'Hi [first_name],</br>Thanks again for choosing [company_name]. We hope everything went smoothly with your [service].</br>Could you take a moment to let us know how we did? Your feedback helps us improve and better serve great clients like you.',
    ],

    'reminder' => [
        'name' => 'Email: Reminder to Provide Feedback',
        'type' => 'email',
        'subject' => "Got a minute? We'd love your feedback",
        'body' => 'Hey [first_name],</br>Just a quick follow-up — we’d still love to hear your thoughts about your recent experience with us.</br>Your feedback makes a big difference, and it only takes a minute.',
    ],

    'social_proof' => [
        'name' => 'Email: Social Proof Request',
        'type' => 'email',
        'subject' => 'Your voice can help others',
        'body' => 'Hi [first_name],</br>We’d love if you could take a moment to leave a quick review of your experience. Many people rely on reviews when choosing a [business_type] like ours.</br>If we did a good job, would you mind sharing your thoughts?',
    ],

    'personal_appeal' => [
        'name' => 'Email: Personal Appeal from Owner',
        'type' => 'email',
        'subject' => 'From me to you — could you help?',
        'body' => 'Hi [first_name],</br>I wanted to personally ask if you’d be willing to leave a quick review of your experience.</br>It really helps us, and your feedback means a lot.',
    ],

    'final_reminder' => [
        'name' => 'Email: Final Feedback Reminder',
        'type' => 'email',
        'subject' => 'Final call — your feedback still matters',
        'body' => 'Hi [first_name],</br>Just one last nudge — we’d still love to hear how your experience was.</br>Your feedback helps us improve and helps others know what to expect.',
    ],

    // SMS templates
    // 'initial_request_sms' => [
    //     'name' => 'SMS: Initial Feedback Request',
    //     'type' => 'sms',
    //     'body' => "Hi [first_name], thanks for choosing [company_name]! We'd love to hear how we did.",
    // ],

    // 'reminder_sms' => [
    //     'name' => 'SMS: Reminder to Provide Feedback',
    //     'type' => 'sms',
    //     'body' => 'Hi [first_name], just a reminder from [company_name] to share your thoughts about your recent experience.',
    // ],

    // 'social_proof_sms' => [
    //     'name' => 'SMS: Social Proof Request',
    //     'type' => 'sms',
    //     'body' => 'Hi [first_name], your review helps others choose a [business_type] like us! If we earned your trust, we’d love your feedback.',
    // ],

    // 'final_reminder_sms' => [
    //     'name' => 'SMS: Final Feedback Reminder',
    //     'type' => 'sms',
    //     'body' => 'Hi [first_name], last chance to share your experience with [company_name]! It really helps us out.',
    // ],
];
