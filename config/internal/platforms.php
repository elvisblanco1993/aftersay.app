<?php

return [
    'google' => [
        'name' => 'Google',
        'example_url' => 'https://g.page/r/CODE/review',
        'instructions' => [
            'Go to https://business.google.com/locations.',
            'Click on the business you manage.',
            'On the dashboard, scroll to "Get more reviews".',
            'Click “Share review form” and copy the link.',
        ],
    ],
    'yelp' => [
        'name' => 'Yelp',
        'example_url' => 'https://www.yelp.com/biz/your-business-name',
        'instructions' => [
            'Go to https://biz.yelp.com/.',
            'Login and select your business.',
            'Copy the public Yelp page link.',
            'Add “?sort_by=date_desc” at the end (optional).',
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
    'healthgrades' => [
        'name' => 'Healthgrades',
        'example_url' => 'https://www.healthgrades.com/provider/your-name-xxxxx',
        'instructions' => [
            'Go to https://www.healthgrades.com.',
            'Search your name or clinic name.',
            'Click your profile and copy the link.',
        ],
    ],
    'zocdoc' => [
        'name' => 'Zocdoc',
        'example_url' => 'https://www.zocdoc.com/doctor/your-name-xxx',
        'instructions' => [
            'Go to https://www.zocdoc.com.',
            'Search your profile and copy the public profile link.',
        ],
    ],
    'ratemds' => [
        'name' => 'RateMDs',
        'example_url' => 'https://www.ratemds.com/doctor-ratings/your-name/',
        'instructions' => [
            'Visit https://www.ratemds.com.',
            'Search for your profile.',
            'Copy the URL from the browser.',
        ],
    ],
    'houzz' => [
        'name' => 'Houzz',
        'example_url' => 'https://www.houzz.com/pro/your-business-name',
        'instructions' => [
            'Log into https://www.houzz.com/pro.',
            'Go to your public profile.',
            'Copy the profile URL.',
        ],
    ],
    'upwork' => [
        'name' => 'Upwork',
        'example_url' => 'https://www.upwork.com/freelancers/~yourprofile',
        'instructions' => [
            'Log into https://www.upwork.com.',
            'Click your profile picture > View profile.',
            'Copy the profile link from the address bar.',
        ],
    ],
    'avvo' => [
        'name' => 'Avvo',
        'example_url' => 'https://www.avvo.com/attorneys/your-name.html',
        'instructions' => [
            'Go to https://www.avvo.com.',
            'Search your name and select your profile.',
            'Copy the profile URL.',
        ],
    ],
    'lawyers_com' => [
        'name' => 'Lawyers.com',
        'example_url' => 'https://www.lawyers.com/your-name/',
        'instructions' => [
            'Go to https://www.lawyers.com.',
            'Search your listing and copy the link.',
        ],
    ],
    'dealerrater' => [
        'name' => 'DealerRater',
        'example_url' => 'https://www.dealerrater.com/dealer/Your-Dealer-Name-review-12345/',
        'instructions' => [
            'Go to https://www.dealerrater.com.',
            'Search your dealership.',
            'Copy the review page URL.',
        ],
    ],
    'vetratingz' => [
        'name' => 'VetRatingz',
        'example_url' => 'https://www.vetratingz.com/reviews/Your-Vet-Clinic-Name/XX',
        'instructions' => [
            'Go to https://www.vetratingz.com.',
            'Search your clinic name.',
            'Click the profile and copy the link.',
        ],
    ],
    'tattoodo' => [
        'name' => 'Tattoodo',
        'example_url' => 'https://www.tattoodo.com/artists/your-name',
        'instructions' => [
            'Log in at https://www.tattoodo.com.',
            'Visit your profile page.',
            'Copy the link from your browser.',
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
    'classpass' => [
        'name' => 'ClassPass',
        'example_url' => 'https://classpass.com/studios/your-business-city',
        'instructions' => [
            'Search your studio at https://classpass.com.',
            'Click your business listing.',
            'Copy the URL from the browser.',
        ],
    ],
    'greatschools' => [
        'name' => 'GreatSchools',
        'example_url' => 'https://www.greatschools.org/your-state/your-school-name/',
        'instructions' => [
            'Go to https://www.greatschools.org.',
            'Search your school and copy the URL.',
        ],
    ],
    'niche' => [
        'name' => 'Niche',
        'example_url' => 'https://www.niche.com/k12/your-school-name/',
        'instructions' => [
            'Go to https://www.niche.com/k12.',
            'Search your school.',
            'Copy the URL from the browser.',
        ],
    ],
    'weddingwire' => [
        'name' => 'WeddingWire',
        'example_url' => 'https://www.weddingwire.com/biz/your-business-name/XXXX.html',
        'instructions' => [
            'Log into https://pro.weddingwire.com.',
            'View your storefront profile.',
            'Copy the link from the address bar.',
        ],
    ],
    'the_knot' => [
        'name' => 'The Knot',
        'example_url' => 'https://www.theknot.com/marketplace/your-business-name-city-state-XXXX',
        'instructions' => [
            'Log into https://www.theknotpro.com.',
            'Click “Storefront” and copy the URL.',
        ],
    ],
    'opentable' => [
        'name' => 'OpenTable',
        'example_url' => 'https://www.opentable.com/r/your-restaurant-name',
        'instructions' => [
            'Go to https://restaurant.opentable.com.',
            'Search and open your restaurant profile.',
            'Copy the URL.',
        ],
    ],
    'tripadvisor' => [
        'name' => 'TripAdvisor',
        'example_url' => 'https://www.tripadvisor.com/Restaurant_Review-gXXXX-your-business-name.html',
        'instructions' => [
            'Go to https://www.tripadvisor.com.',
            'Search your listing and copy the review page URL.',
        ],
    ],
    'indeed' => [
        'name' => 'Indeed',
        'example_url' => 'https://www.indeed.com/cmp/Your-Business-Name/reviews',
        'instructions' => [
            'Search your business at https://www.indeed.com/companies.',
            'Click “Reviews” and copy the URL.',
        ],
    ],
    'glassdoor' => [
        'name' => 'Glassdoor',
        'example_url' => 'https://www.glassdoor.com/Reviews/Your-Company-Reviews-E123456.htm',
        'instructions' => [
            'Search your company at https://www.glassdoor.com.',
            'Click on the review section and copy the link.',
        ],
    ],
    'chamberofcommerce' => [
        'name' => 'ChamberofCommerce',
        'example_url' => 'https://www.chamberofcommerce.com/united-states/your-business-name-XXXXX',
        'instructions' => [
            'Go to https://www.chamberofcommerce.com.',
            'Search your business and copy the listing URL.',
        ],
    ],
    'mapquest_local_listings' => [
        'name' => 'MapQuest Local Listings',
        'example_url' => 'https://www.mapquest.com/us/your-business-name-XXXXX',
        'instructions' => [
            'Search your business on https://www.mapquest.com.',
            'Click the business listing and copy the URL.',
        ],
    ],
];
