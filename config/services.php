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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '617186750117480',
        'client_secret' => '90eb3b90c70bf6ed7b97729e855631c2',
        'redirect' => 'https://news.net.dev/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '707030790287-5km12vt9498i9gnt1jjgtuf7sblsu2jt.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://news.net.dev/auth/google/callback',
    ],

];
