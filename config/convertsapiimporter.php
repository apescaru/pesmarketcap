<?php

return [
    'conapi' => [
        'secret' => 'DGW$T$WREF34534534tgTYI^IILILL'
    ],

    'redis' => [
        'connection_name' => 'redis_queue',

        /* Add the database connection to your dabase connection config file
         * Example:
        'redis_queue' => [
            'host' => env('REDIS_HOST', '<IP>'),
            'password' => env('REDIS_PASSWORD', PASSWORD),
            'port' => env('REDIS_PORT', '<PORT>'),
            'database' => env('REDIS_QUEUE_DATABASE', '<DATABASE NUMBER>'),
        ],
        */
        'queue_name' => 'redis_queue'

        /* Add the queue configuration to your queue config file
         * Example:
         'redis_queue' => [
            'driver' => 'redis',
            'connection' => 'redis_queue',
            'queue' => 'high',
            'retry_after' => 90,
        ],
         */
    ],
];
