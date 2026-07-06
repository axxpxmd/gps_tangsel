<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Resend, Postmark, AWS, and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'aladhan' => [
        'base_url' => env('ALADHAN_BASE_URL', 'https://api.aladhan.com/v1'),
        'city' => env('ALADHAN_CITY', 'Tangerang Selatan'),
        'latitude' => env('ALADHAN_LATITUDE', -6.2376),
        'longitude' => env('ALADHAN_LONGITUDE', 106.6489),
        'method' => (int) env('ALADHAN_METHOD', 20),
        'timeout' => (int) env('ALADHAN_TIMEOUT', 8),
        'verify_ssl' => filter_var(env('ALADHAN_VERIFY_SSL', true), FILTER_VALIDATE_BOOLEAN),
    ],

];
