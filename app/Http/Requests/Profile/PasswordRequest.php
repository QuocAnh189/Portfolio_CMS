<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|uuid',
            'new_password' => [
                'required',
                'confirmed',
                Password::min(8)
                // ->mixedCase()
                // ->numbers()
                // ->symbols(),
            ],
            'new_password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.confirmed' => 'Mật khẩu xác nhận không khớp với mật khẩu mới.',
            'new_password_confirmation.required' => 'Vui lòng nhập xác nhận mật khẩu',

            // 'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            // 'new_password.mixedCase' => 'Mật khẩu mới phải chứa ít nhất một chữ hoa và một chữ thường.',
            // 'new_password.numbers' => 'Mật khẩu mới phải chứa ít nhất một chữ số.',
            // 'new_password.symbols' => 'Mật khẩu mới phải chứa ít nhất một ký tự đặc biệt.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        flash()->error($validator->errors()->first());

        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
        );
    }
}
