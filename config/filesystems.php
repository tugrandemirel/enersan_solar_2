<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    */

    'default' => env('FILESYSTEM_DISK', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        // Dosyalar doğrudan public/uploads klasörüne gidecek
        'public' => [
            'driver' => 'local',
            'root' => public_path('uploads'), // Fiziksel yol
            'url' => env('APP_URL').'/uploads', // URL öneki
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | storage:link komutu ile oluşturulacak sembolik linkler.
    | uploads doğrudan public altında olduğu için gerek kalmadı.
    |
    */

    'links' => [
        // Klasik yapı devam ederse bu aktif olabilir:
        // public_path('storage') => storage_path('app/public'),
    ],

];
