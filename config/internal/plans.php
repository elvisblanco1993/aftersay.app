<?php

return [

    'plans' => [

        'free' => [
            'name' => 'Free',
            'price' => 0,
            'max_contacts' => 25,
            'max_links_per_contact' => 1,
            'max_review_platforms' => 1,
            'internal_reviews' => true,
            'custom_branding' => false,
            'analytics' => false,
            'show_powered_by' => true,
        ],

        'starter' => [
            'name' => 'Starter',
            'price' => 15,
            'stripe_product_id' => env('STRIPE_PRODUCT_STARTER', 'prod_STARTER'),
            'stripe_price_id' => env('STRIPE_PRICE_STARTER', 'price_STARTER'),
            'max_contacts' => 500,
            'max_links_per_contact' => 3,
            'max_review_platforms' => 3,
            'internal_reviews' => true,
            'custom_branding' => true,
            'analytics' => false,
            'show_powered_by' => false,
        ],

        'pro' => [
            'name' => 'Pro',
            'price' => 29,
            'stripe_product_id' => env('STRIPE_PRODUCT_PRO', 'prod_PRO'),
            'stripe_price_id' => env('STRIPE_PRICE_PRO', 'price_PRO'),
            'max_contacts' => 2500,
            'max_links_per_contact' => -1,
            'max_review_platforms' => -1,
            'internal_reviews' => true,
            'custom_branding' => true,
            'analytics' => true,
            'show_powered_by' => false,
        ],
    ],

];
