<?php

return [
    'google' => [
        'name' => 'Google',
        'example_url' => 'https://g.page/r/CODE/review',
        'instructions' => [
            'Go to <a href="https://business.google.com/locations" target="_blank" class="underline">https://business.google.com/locations</a>.',
            'Click on the business you manage.',
            'On the dashboard, scroll to "Get more reviews".',
            'Click “Share review form” and copy the link.',
        ],
    ],

    'facebook' => [
        'name' => 'Facebook',
        'example_url' => 'https://www.facebook.com/YourBusiness/reviews/',
        'instructions' => [
            'Go to your business Facebook page.',
            'Click on “Reviews” tab.',
            'Copy the URL from your browser’s address bar.',
        ],
    ],

    'yelp' => [
        'name' => 'Yelp',
        'example_url' => 'https://www.yelp.com/biz/your-business-name',
        'instructions' => [
            'Go to <a href="https://biz.yelp.com/" target="_blank" class="underline">https://biz.yelp.com/</a>.',
            'Login and select your business.',
            'Copy the public Yelp page link.',
            'Add “?sort_by=date_desc” at the end (optional).',
        ],
    ],

    'tripadvisor' => [
        'name' => 'TripAdvisor',
        'example_url' => 'https://www.tripadvisor.com/Restaurant_Review-gXXXX-your-business-name.html',
        'instructions' => [
            'Go to <a href="https://www.tripadvisor.com" target="_blank" class="underline">https://www.tripadvisor.com</a>.',
            'Search your listing and copy the review page URL.',
        ],
    ],

    'indeed' => [
        'name' => 'Indeed',
        'example_url' => 'https://www.indeed.com/cmp/Your-Business-Name/reviews',
        'instructions' => [
            'Search your business at <a href="https://www.indeed.com/companies" target="_blank" class="underline">https://www.indeed.com/companies</a>.',
            'Click “Reviews” and copy the URL.',
        ],
    ],

    'glassdoor' => [
        'name' => 'Glassdoor',
        'example_url' => 'https://www.glassdoor.com/Reviews/Your-Company-Reviews-E123456.htm',
        'instructions' => [
            'Search your company at <a href="https://www.glassdoor.com" target="_blank" class="underline">https://www.glassdoor.com</a>.',
            'Click on the review section and copy the link.',
        ],
    ],

    'opentable' => [
        'name' => 'OpenTable',
        'example_url' => 'https://www.opentable.com/r/your-restaurant-name',
        'instructions' => [
            'Go to <a href="https://restaurant.opentable.com" target="_blank" class="underline">https://restaurant.opentable.com</a>.',
            'Search and open your restaurant profile.',
            'Copy the URL.',
        ],
    ],

    'zocdoc' => [
        'name' => 'Zocdoc',
        'example_url' => 'https://www.zocdoc.com/doctor/your-name-xxx',
        'instructions' => [
            'Go to <a href="https://www.zocdoc.com" target="_blank" class="underline">https://www.zocdoc.com</a>.',
            'Search your profile and copy the public profile link.',
        ],
    ],

    'healthgrades' => [
        'name' => 'Healthgrades',
        'example_url' => 'https://www.healthgrades.com/provider/your-name-xxxxx',
        'instructions' => [
            'Go to <a href="https://www.healthgrades.com" target="_blank" class="underline">https://www.healthgrades.com</a>.',
            'Search your name or clinic name.',
            'Click your profile and copy the link.',
        ],
    ],

    'ratemds' => [
        'name' => 'RateMDs',
        'example_url' => 'https://www.ratemds.com/doctor-ratings/your-name/',
        'instructions' => [
            'Visit <a href="https://www.ratemds.com" target="_blank" class="underline">https://www.ratemds.com</a>.',
            'Search for your profile.',
            'Copy the URL from the browser.',
        ],
    ],

    'avvo' => [
        'name' => 'Avvo',
        'example_url' => 'https://www.avvo.com/attorneys/your-name.html',
        'instructions' => [
            'Go to <a href="https://www.avvo.com" target="_blank" class="underline">https://www.avvo.com</a>.',
            'Search your name and select your profile.',
            'Copy the profile URL.',
        ],
    ],

    'lawyers_com' => [
        'name' => 'Lawyers.com',
        'example_url' => 'https://www.lawyers.com/your-name/',
        'instructions' => [
            'Go to <a href="https://www.lawyers.com" target="_blank" class="underline">https://www.lawyers.com</a>.',
            'Search your listing and copy the link.',
        ],
    ],

    'dealerrater' => [
        'name' => 'DealerRater',
        'example_url' => 'https://www.dealerrater.com/dealer/Your-Dealer-Name-review-12345/',
        'instructions' => [
            'Go to <a href="https://www.dealerrater.com" target="_blank" class="underline">https://www.dealerrater.com</a>.',
            'Search your dealership.',
            'Copy the review page URL.',
        ],
    ],

    'chamberofcommerce' => [
        'name' => 'ChamberofCommerce',
        'example_url' => 'https://www.chamberofcommerce.com/united-states/your-business-name-XXXXX',
        'instructions' => [
            'Go to <a href="https://www.chamberofcommerce.com" target="_blank" class="underline">https://www.chamberofcommerce.com</a>.',
            'Search your business and copy the listing URL.',
        ],
    ],

    'houzz' => [
        'name' => 'Houzz',
        'example_url' => 'https://www.houzz.com/pro/your-business-name',
        'instructions' => [
            'Log into <a href="https://www.houzz.com/pro" target="_blank" class="underline">https://www.houzz.com/pro</a>.',
            'Go to your public profile.',
            'Copy the profile URL.',
        ],
    ],

    'classpass' => [
        'name' => 'ClassPass',
        'example_url' => 'https://classpass.com/studios/your-business-city',
        'instructions' => [
            'Search your studio at <a href="https://classpass.com" target="_blank" class="underline">https://classpass.com</a>.',
            'Click your business listing.',
            'Copy the URL from the browser.',
        ],
    ],

    'mindbody' => [
        'name' => 'Mindbody',
        'example_url' => 'https://clients.mindbodyonline.com/classic/ws?studioid=XXXX&stype=-9',
        'instructions' => [
            'Log into your Mindbody dashboard.',
            'Navigate to “Client Tools” > “Review Links.”',
            'Copy the “Leave a Review” URL.',
        ],
    ],

    'weddingwire' => [
        'name' => 'WeddingWire',
        'example_url' => 'https://www.weddingwire.com/biz/your-business-name/XXXX.html',
        'instructions' => [
            'Log into <a href="https://pro.weddingwire.com" target="_blank" class="underline">https://pro.weddingwire.com</a>.',
            'View your storefront profile.',
            'Copy the link from the address bar.',
        ],
    ],

    'the_knot' => [
        'name' => 'The Knot',
        'example_url' => 'https://www.theknot.com/marketplace/your-business-name-city-state-XXXX',
        'instructions' => [
            'Log into <a href="https://www.theknotpro.com" target="_blank" class="underline">https://www.theknotpro.com</a>.',
            'Click “Storefront” and copy the URL.',
        ],
    ],

    'greatschools' => [
        'name' => 'GreatSchools',
        'example_url' => 'https://www.greatschools.org/your-state/your-school-name/',
        'instructions' => [
            'Go to <a href="https://www.greatschools.org" target="_blank" class="underline">https://www.greatschools.org</a>.',
            'Search your school and copy the URL.',
        ],
    ],

    'niche' => [
        'name' => 'Niche',
        'example_url' => 'https://www.niche.com/k12/your-school-name/',
        'instructions' => [
            'Go to <a href="https://www.niche.com/k12" target="_blank" class="underline">https://www.niche.com/k12</a>.',
            'Search your school.',
            'Copy the URL from the browser.',
        ],
    ],

    'upwork' => [
        'name' => 'Upwork',
        'example_url' => 'https://www.upwork.com/freelancers/~yourprofile',
        'instructions' => [
            'Log into <a href="https://www.upwork.com" target="_blank" class="underline">https://www.upwork.com</a>.',
            'Click your profile picture > View profile.',
            'Copy the profile link from the address bar.',
        ],
    ],

    'tattoodo' => [
        'name' => 'Tattoodo',
        'example_url' => 'https://www.tattoodo.com/artists/your-name',
        'instructions' => [
            'Log in at <a href="https://www.tattoodo.com" target="_blank" class="underline">https://www.tattoodo.com</a>.',
            'Visit your profile page.',
            'Copy the link from your browser.',
        ],
    ],

    'vetratingz' => [
        'name' => 'VetRatingz',
        'example_url' => 'https://www.vetratingz.com/reviews/Your-Vet-Clinic-Name/XX',
        'instructions' => [
            'Go to <a href="https://www.vetratingz.com" target="_blank" class="underline">https://www.vetratingz.com</a>.',
            'Search your clinic name.',
            'Click the profile and copy the link.',
        ],
    ],

    'mapquest_local_listings' => [
        'name' => 'MapQuest Local Listings',
        'example_url' => 'https://www.mapquest.com/us/your-business-name-XXXXX',
        'instructions' => [
            'Search your business on <a href="https://www.mapquest.com" target="_blank" class="underline">https://www.mapquest.com</a>.',
            'Click the business listing and copy the URL.',
        ],
    ],
];
