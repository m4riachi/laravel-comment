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
        if (auth()->check()) {
            $validators = [
                'comment' => config('m4-comment.input-validator.comment', ['required', 'string'])
            ];
        } else {
            $validators = config('m4-comment.input-validator', [
                'user_name' => ['required', 'string', 'max:192'],
                'user_email' => ['required', 'string', 'email', 'max:192'],
                'comment' => ['required', 'string'],
            ]);
        }

        $validators['url_path'] = ['required'];
        $validators['url_query'] = ['nullable'];
        $validators['user_id'] = ['nullable'];
        $validators['status'] = ['required'];

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
