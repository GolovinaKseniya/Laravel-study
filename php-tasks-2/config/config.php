<?php

return [
    'default' => [
        'mysql'
    ],
    'connections' => [
        'mysql' => [
            'db' => 'mysql:host=localhost;dbname=test',
            'user' => 'root',
            'pass' => '123456'
        ],
        'file' => [
            'extension' => '.txt',
            'path' => 'storage'
        ]
    ]
];