<?php

namespace M4riachi\LaravelComment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use M4riachi\LaravelComment\Actions\RecaptchaVerifyingUserResponseAction;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => (auth()->check()) ? auth()->user()->id : null,
            'status' => config('m4-comment.default_status', 'pending'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validators = [
            'url_path' => ['required'],
            'url_query' => ['nullable'],
            'user_id' => ['nullable'],
            'm4_comment_id' => ['nullable'],
            'status' => ['required'],
            'user_name' => config('m4-comment.input-validator.user_name', ['required', 'string', 'max:192']),
            'user_email' => config('m4-comment.input-validator.user_email', ['required', 'string', 'max:192']),
            'comment' => config('m4-comment.input-validator.comment', ['required', 'string']),
        ];

        if (auth()->check()) {
            $validators['user_email'] = $validators['user_name'] = ['nullable'];
        }

        return $validators;
    }

    /**
     * Configure the validator instance.
     *
     * @param \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!RecaptchaVerifyingUserResponseAction::execute($this)) {
                $validator->errors()->add('recaptcha', 'Captcha validator is invalid please try again later!');
            }
        });
    }
}
