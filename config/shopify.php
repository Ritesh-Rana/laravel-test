<?php

return [

    'credentials' => [

        /*
         * The API access token from the private app.
         */
        'access_token' => env('SHOPIFY_ACCESS_TOKEN', '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'),

        /*
         * The shopify domain for your shop.
         */
        'domain' => env('SHOPIFY_DOMAIN', 'megamartone.myshopify.com'),

        /*
         * The shopify api version.
         */
        'api_version' => env('SHOPIFY_API_VERSION', '2021-07'),

    ],

    'webhooks' => [

        /*
         * The webhook secret provider to use.
         */
        'secret_provider' => \Signifly\Shopify\Webhooks\ConfigSecretProvider::class,

        /*
         * The shopify webhook secret.
         */
        'secret' => env('SHOPIFY_WEBHOOK_SECRET'),

    ],

    'exceptions' => [

        /*
         * Whether to include the validation errors in the exception message.
         */
        'include_validation_errors' => false,

    ],
];
