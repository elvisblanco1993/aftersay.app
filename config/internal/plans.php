<?php

return [
    'starter' => [
        'name' => 'Starter',
        'price_monthly' => 19,
        'price_annual' => 190,
        'stripe_product_id' => env('STRIPE_PRODUCT_STARTER'),
        'stripe_monthly_price_id' => env('STRIPE_MONTHLY_PRICE_STARTER'),
        'stripe_annual_price_id' => env('STRIPE_ANNUAL_PRICE_STARTER'),
        'features' => [
            'max_contacts' => 200,
            'max_review_platforms' => 3,
            'internal_reviews' => true,
            'custom_branding' => true,
            'analytics' => true,
            'show_powered_by' => true,
        ],
    ],

    'growth' => [
        'name' => 'Growth',
        'price_monthly' => 39,
        'price_annual' => 390,
        'stripe_product_id' => env('STRIPE_PRODUCT_GROWTH'),
        'stripe_monthly_price_id' => env('STRIPE_MONTHLY_PRICE_GROWTH'),
        'stripe_annual_price_id' => env('STRIPE_ANNUAL_PRICE_GROWTH'),
        'features' => [
            'max_contacts' => 500,
            'max_review_platforms' => 10,
            'internal_reviews' => true,
            'custom_branding' => true,
            'analytics' => true,
            'show_powered_by' => false,
        ],
    ],

    'business' => [
        'name' => 'Business',
        'price_monthly' => 99,
        'price_annual' => 990,
        'stripe_product_id' => env('STRIPE_PRODUCT_BUSINESS'),
        'stripe_monthly_price_id' => env('STRIPE_MONTHLY_PRICE_BUSINESS'),
        'stripe_annual_price_id' => env('STRIPE_ANNUAL_PRICE_BUSINESS'),
        'features' => [
            'max_contacts' => 2500,
            'max_review_platforms' => -1,
            'internal_reviews' => true,
            'custom_branding' => true,
            'analytics' => true,
            'show_powered_by' => false,
        ],
    ],
];
