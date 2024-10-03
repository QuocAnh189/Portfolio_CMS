<?php // config/flasher.php

return [
    'plugins' => [
        'toastr' => [
            'scripts' => [
                '/vendor/flasher/jquery.min.js',
                '/vendor/flasher/toastr.min.js',
                '/vendor/flasher/flasher-toastr.min.js',
            ],
            'styles' => [
                '/vendor/flasher/toastr.min.css',
            ],
            'option' => [
                // Optional: Add global options here
                'closeButton' => true,
                'position' => 'top-center',
            ],
        ],
    ],
];
