<?php

return [
    'tika' => [
        'host' => env('TIKA_HOST', 'localhost'),
        'port' => env('TIKA_PORT', 9998),
        'timeout' => env('TIKA_TIMEOUT', 15),
    ],
];
