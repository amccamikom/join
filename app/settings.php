<?php
return [
    'settings' => [
        'base_url' => getenv('APP_URL'),

        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => getenv('DEBUG'),

        // View settings
        'view' => [
            'template_path' => __DIR__ . '/views',
            'cache_path' => __DIR__ . '/../cache/blade',
        ],

        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => __DIR__ . '/../log/app.log',
        ],
    ],
];
