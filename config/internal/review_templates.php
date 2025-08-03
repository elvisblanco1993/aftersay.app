<?php

return [

    // Email templates
    [
        'key' => 'initial_request',
        'name' => 'Email: Initial Feedback Request',
        'type' => 'email',
        'subject' => 'Quick favor — how did we do?',
        'body' => "Hi {{ customer_name }},\n\nThanks again for choosing {{ company_name }}. We hope everything went smoothly with your {{ service }}.\n\nCould you take a moment to let us know how we did? Your feedback helps us improve and better serve great clients like you.\n\n[Leave Feedback]({{ feedback_link }})\n\nAlready left a review? [Let us know here]({{ already_left_review_link }})\n\nAppreciate your time,\n{{ sender_name }}\n{{ company_name }}",
    ],

    [
        'key' => 'reminder',
        'name' => 'Email: Reminder to Provide Feedback',
        'type' => 'email',
        'subject' => 'Got a minute? We\'d love your feedback',
        'body' => "Hey {{ customer_name }},\n\nJust a quick follow-up—we’d still love to hear your thoughts about your recent experience with us.\n\nYour feedback makes a big difference, and it only takes a minute:\n\n[Share Feedback]({{ feedback_link }})\n\nAlready shared? [Let us know]({{ already_left_review_link }})\n\nThanks again for your time,\n{{ sender_name }}",
    ],

    [
        'key' => 'social_proof',
        'name' => 'Email: Social Proof Request',
        'type' => 'email',
        'subject' => 'Your voice can help others',
        'body' => "Hi {{ customer_name }},\n\nWe’d love if you could take a moment to leave a quick review of your experience. Many people rely on reviews when choosing a {{ business_type }} like ours.\n\nIf we did a good job, would you mind sharing your thoughts?\n\n[Leave a Review]({{ review_link }})\n\nAlready done? [Click here so we don’t email again]({{ already_left_review_link }})\n\nThanks again — it really means a lot,\n{{ sender_name }}",
    ],

    [
        'key' => 'incentive_request',
        'name' => 'Email: Incentive Offer for Review',
        'type' => 'email',
        'subject' => 'A small thank-you for your time',
        'body' => "Hi {{ customer_name }},\n\nWe know life gets busy—but if you could leave us a quick review, we’d love to thank you with {{ incentive_description }}.\n\nYour honest review helps others and helps us grow.\n\n[Leave a Review]({{ review_link }})\n\nAlready left one? [Let us know here]({{ already_left_review_link }})\n\nThanks for your support,\n{{ sender_name }}",
    ],

    [
        'key' => 'personal_appeal',
        'name' => 'Email: Personal Appeal from Owner',
        'type' => 'email',
        'subject' => 'From me to you — could you help?',
        'body' => "Hi {{ customer_name }},\n\nThis is {{ sender_name }} from {{ company_name }}. I wanted to personally ask if you’d be willing to leave a quick review of your experience.\n\nIt really helps us, and your feedback means a lot.\n\n[Leave a Review]({{ review_link }})\n\nAlready shared? [Click here]({{ already_left_review_link }})\n\nThank you again,\n{{ sender_name }}",
    ],

    [
        'key' => 'final_reminder',
        'name' => 'Email: Final Feedback Reminder',
        'type' => 'email',
        'subject' => 'Final call — your feedback still matters',
        'body' => "Hi {{ customer_name }},\n\nJust one last nudge — we’d still love to hear how your experience was.\n\nYour feedback helps us improve and helps others know what to expect.\n\n[Share Your Feedback]({{ feedback_link }})\n\nAlready reviewed us? [Let us know here]({{ already_left_review_link }})\n\nThanks again for being a part of {{ company_name }},\n{{ sender_name }}",
    ],

    // SMS templates
    [
        'key' => 'initial_request_sms',
        'name' => 'SMS: Initial Feedback Request',
        'type' => 'sms',
        'body' => 'Hi {{ customer_name }}, thanks for choosing {{ company_name }}! Could you please take a moment to share your feedback? {{ feedback_link }} Already left a review? Let us know: {{ already_left_review_link }}',
    ],

    [
        'key' => 'reminder_sms',
        'name' => 'SMS: Reminder to Provide Feedback',
        'type' => 'sms',
        'body' => "Hi {{ customer_name }}, just a quick reminder from {{ company_name }} to share your feedback if you haven't yet: {{ feedback_link }} Already shared? Let us know here: {{ already_left_review_link }}",
    ],

    [
        'key' => 'social_proof_sms',
        'name' => 'SMS: Social Proof Request',
        'type' => 'sms',
        'body' => 'Hi {{ customer_name }}, your review helps others choose {{ business_type }} like us! If we earned your trust, please leave a quick review: {{ review_link }} Already done? Let us know: {{ already_left_review_link }}',
    ],

    [
        'key' => 'final_reminder_sms',
        'name' => 'SMS: Final Feedback Reminder',
        'type' => 'sms',
        'body' => 'Hi {{ customer_name }}, last call to share your feedback with {{ company_name }}! It means a lot to us: {{ feedback_link }} Already reviewed? Let us know: {{ already_left_review_link }}',
    ],

];
