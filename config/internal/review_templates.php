<?php

return [

    // Email templates
    'initial_request' => [
        'name' => 'Initial Feedback Request',
        'type' => 'email',
        'subject' => 'How was your experience?',
        'body' => 'Hi [first_name],<br><br>Thanks again for choosing <strong>[company_name]</strong>. We hope everything went smoothly during your recent visit.<br><br>Would you mind taking a quick moment to share your experience? It only takes about a minute, and your feedback helps us improve and better serve clients like you.<br><br>👉 [feedback_url]<br><br>We truly appreciate your time.<br><br>- The [company_name] Team',
    ],

    'reminder' => [
        'name' => 'Reminder to Provide Feedback',
        'type' => 'email',
        'subject' => 'Quick reminder — we’d still love your feedback',
        'body' => 'Hi [first_name],<br><br>Just a quick follow-up to see if you had a chance to share your thoughts about your recent experience with <strong>[company_name]</strong>.<br><br>Your feedback really does make a difference, and it only takes a moment to complete.<br><br>👉 [feedback_url]<br><br>Thanks again — we appreciate you!<br><br>- The [company_name] Team',
    ],

    'social_proof' => [
        'name' => 'Social Proof Request',
        'type' => 'email',
        'subject' => 'Your review could help someone else today',
        'body' => 'Hi [first_name],<br><br>Many people rely on reviews when choosing a <strong>[business_type]</strong>, and your experience could help others make a confident decision.<br><br>If we met or exceeded your expectations, we’d truly appreciate you sharing a quick review.<br><br>👉 [feedback_url]<br><br>Thank you for supporting our business — it means more than you know.<br><br>- The [company_name] Team',
    ],

    'personal_appeal' => [
        'name' => 'Personal Appeal from Owner',
        'type' => 'email',
        'subject' => 'A quick personal favor from me',
        'body' => 'Hi [first_name],<br><br>I wanted to personally reach out and ask if you’d be willing to leave a short review about your experience with <strong>[company_name]</strong>.<br><br>Feedback from clients like you helps us grow, improve, and continue delivering great service.<br><br>👉 [feedback_url]<br><br>Thank you for your time — I truly appreciate it.<br><br>Sincerely,<br>[owner_name]',
    ],

    'final_reminder' => [
        'name' => 'Final Feedback Reminder',
        'type' => 'email',
        'subject' => 'Last reminder — we’d still love your input',
        'body' => 'Hi [first_name],<br><br>This is just a final note in case you still wanted to share feedback about your experience with <strong>[company_name]</strong>.<br><br>Your input helps us improve and helps others know what to expect when choosing our services.<br><br>👉 [feedback_url]<br><br>Thanks again for your time and support.<br><br>— The [company_name] Team',
    ],

];
