<?php
return [
    'guest-user' => true,
    'ajax' => [
        'enable' => true,
        'include_axios' => true,
    ],
    'default_status' => 'pending',
    'with_url_query' => false,
    'user_class' => '\App\Models\User',
    'input-validator' => [
        'user_name' => ['required', 'string', 'max:192'],
        'user_email' => ['required', 'string', 'email', 'max:192'],
        'comment' => ['required', 'string'],
    ],
    'recaptcha' => [
        'enable' => false,
        'site-key' => '',
        'secret-key' => '',
        'checked_score' => 0.4
    ],
];
