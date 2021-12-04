<?php

namespace M4riachi\LaravelComment\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecaptchaVerifyingUserResponseAction
{
    public static function execute(Request $request)
    {
        if (config('m4-comment.recaptcha.enable', false)) {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('m4-comment.recaptcha.secret-key', ''),
                'response' => $request->get('g-recaptcha-response', null),
            ])->json();

            if (!$response['success'] || $response['score'] < config('m4-comment.recaptcha.checked_score', 0.4)) {
                return false;
            }
        }

        return true;
    }
}
