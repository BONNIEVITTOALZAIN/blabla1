<?php

return [

    'paths' => ['api/*'],  // Menentukan API yang diizinkan

    'allowed_methods' => ['*'],  // Semua metode HTTP seperti GET, POST, dll.

    'allowed_origins' => ['*'],  // Anda dapat mengubah * dengan URL domain Anda jika dibutuhkan

    'allowed_headers' => ['*'],  // Semua header dibolehkan

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
];
