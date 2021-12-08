<?php
return [
    'guest-user' => true, //enable guest user to post a comment
    'ajax' => [
        'enable' => true, //enable ajax post
        'include_axios' => true, // if false you must have axios on your js files
    ],
    'default_status' => 'pending', // there is two options [pending or approved]
    'with_url_query' => false, // if true the url query will be linked to
    'user_class' => '\App\Models\User', // the user model class
    'input-validator' => [
        'user_name' => ['required', 'string', 'max:192'],
        'user_email' => ['required', 'string', 'email', 'max:192'],
        'comment' => ['required', 'string'],
    ],
    'recaptcha' => [
        'enable' => false,
        'site-key' => '', // value to get from the recaptcha website
        'secret-key' => '', // value to get from the recaptcha website
        'checked_score' => 0.4
    ],
];
