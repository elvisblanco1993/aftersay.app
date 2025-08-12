<?php

return [

    'plans' => [
        'starter' => [
            'name' => 'Starter',
            'price' => 19,
            'stripe_product_id' => env('STRIPE_PRODUCT_STARTER'),
            'stripe_price_id' => env('STRIPE_PRICE_STARTER'),
            'max_contacts' => 200,
            'max_links_per_contact' => 3,
            'max_review_platforms' => 3,
            'internal_reviews' => true,
            'custom_branding' => true,
            'analytics' => false,
            'show_powered_by' => false,
        ],

        'growth' => [
            'name' => 'Growth',
            'price' => 39,
            'stripe_product_id' => env('STRIPE_PRODUCT_GROWTH'),
            'stripe_price_id' => env('STRIPE_PRICE_GROWTH'),
            'max_contacts' => 500,
            'max_links_per_contact' => -1,
            'max_review_platforms' => -1,
            'internal_reviews' => true,
            'custom_branding' => true,
            'analytics' => true,
            'show_powered_by' => false,
        ],

        'business' => [
            'name' => 'Business',
            'price' => 99,
            'stripe_product_id' => env('STRIPE_PRODUCT_BUSINESS'),
            'stripe_price_id' => env('STRIPE_PRICE_BUSINESS'),
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
