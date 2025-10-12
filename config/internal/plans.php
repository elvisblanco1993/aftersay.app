<?php

return [
    '50' => [
        'price_monthly' => 15,
        'price_annual' => 150,
        'campaigns_per_month' => 50,
        'max_review_platforms' => 3,
        'stripe_price_id_monthly' => env('STRIPE_PRICE_15_MONTHLY'),
        'stripe_price_id_annual' => env('STRIPE_PRICE_15_ANNUAL'),
    ],

    '150' => [
        'price_monthly' => 25,
        'price_annual' => 250,
        'campaigns_per_month' => 150,
        'max_review_platforms' => 6,
        'stripe_price_id_monthly' => env('STRIPE_PRICE_25_MONTHLY'),
        'stripe_price_id_annual' => env('STRIPE_PRICE_25_ANNUAL'),
    ],

    '500' => [
        'price_monthly' => 45,
        'price_annual' => 450,
        'campaigns_per_month' => 500,
        'max_review_platforms' => 10,
        'stripe_price_id_monthly' => env('STRIPE_PRICE_45_MONTHLY'),
        'stripe_price_id_annual' => env('STRIPE_PRICE_45_ANNUAL'),
    ],

    '1000' => [
        'price_monthly' => 60,
        'price_annual' => 600,
        'campaigns_per_month' => 1000,
        'max_review_platforms' => 15,
        'stripe_price_id_monthly' => env('STRIPE_PRICE_60_MONTHLY'),
        'stripe_price_id_annual' => env('STRIPE_PRICE_60_ANNUAL'),
    ],

    '2500' => [
        'price_monthly' => 100,
        'price_annual' => 1000,
        'campaigns_per_month' => 2500,
        'max_review_platforms' => 20,
        'stripe_price_id_monthly' => env('STRIPE_PRICE_100_MONTHLY'),
        'stripe_price_id_annual' => env('STRIPE_PRICE_100_ANNUAL'),
    ],

    '5000' => [
        'price_monthly' => 140,
        'price_annual' => 1400,
        'campaigns_per_month' => 5000,
        'max_review_platforms' => 25,
        'stripe_price_id_monthly' => env('STRIPE_PRICE_140_MONTHLY'),
        'stripe_price_id_annual' => env('STRIPE_PRICE_140_ANNUAL'),
    ],

    '10000' => [
        'price_monthly' => 200,
        'price_annual' => 2000,
        'campaigns_per_month' => 10000,
        'max_review_platforms' => -1, // unlimited
        'stripe_price_id_monthly' => env('STRIPE_PRICE_200_MONTHLY'),
        'stripe_price_id_annual' => env('STRIPE_PRICE_200_ANNUAL'),
    ],
];
