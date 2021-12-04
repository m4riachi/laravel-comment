<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'guest-user' => true,
    'default_status' => 'pending',
    'input-validator' => [
        'user_name' => ['required', 'string', 'max:192'],
        'user_email' => ['required', 'string', 'email', 'max:192'],
        'comment' => ['required', 'string'],
    ],
    'recaptcha' => [
        'enable' => true,
        'site-key' => '6Lcii3IdAAAAAIVRrwtjr-DiKxmMXRMmA6DUTZWu',
        'secret-key' => '6Lcii3IdAAAAAOG_aCtDuALiohIGHmq9GrVCf_i7',
        'checked_score' => 0.4
    ],
];
