<?php

return [
    'default' => 'mysql',
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'db' => 'mysql:host=localhost;dbname=test',
            'user' => 'root',
            'pass' => '123456'
        ],
        'file' => [
            'driver' => 'file',
            'extension' => '.txt',
            'path' => 'storage'
        ]
    ]
];