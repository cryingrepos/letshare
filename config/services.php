<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' =>[
        'client_id' => env('GOOGLE_CLIENT_ID','63804529454-b6rb76sbtrv61rdkbqcae6tsj46prole.apps.googleusercontent.com'),
        'client_secret' =>env('GOOGLE_CLIENT_SECRET','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'),
        'redirect' => 'https://avrt.com/auth/google/callback',
    ],
      'facebook' =>[
        'client_id' =>env('FACEBOOK_CLIENT_ID') ,
        'client_secret' =>env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => 'https://avrt.com/auth/facebook/callback',
    ],
      'twitter' =>[
        'client_id' => '',
        'client_secret' => '',
        'redirect' => '',
    ],
      'insatgram' =>[
        'client_id' => '',
        'client_secret' => '',
        'redirect' => '',
    ],
    'linkdin' =>[
        'client_id' => '',
        'client_secret' => '',
        'redirect' => '',
    ],
    'github' =>[
        'client_id' =>'',
        'client_secret' => '',
        'redirect' => '',
    ],

];
