<?php
return [

    'models' => \App\Models\User::class,

    'default_driver' => 'master',

    'table_names' => [

        'configs' => 'lakala_configs',

        'logs' => 'lakala_send_logs',

    ],

    'driver' => [

        'master' => [
            'app_id' => 'app_566685l4QM9Mb1Mq',
            'merchant_id' => '872100003015000',
            'secret' => '0de49f2c023645149c06924fa785cfa0',
            'private_key' => storage_path('lakala_rsa_private.key'),
            'public_key' => storage_path('lakala_rsa_public.key'),
            'lakala_key' => storage_path('lakala_paymax_rsa_public.key'),
        ],

    ]
];
