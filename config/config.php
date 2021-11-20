<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'guest-user' => true,
    'input-validator' => [
        'name' => ['required', 'string', 'max:192'],
        'email' => ['required', 'string', 'email', 'max:192'],
        'comment' => ['required', 'string'],
    ]
];
