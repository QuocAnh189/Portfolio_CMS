<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
        $user = $this->route('user');

        return [
            'user_id' => 'required|uuid',
            'profile_id' => 'required|uuid',
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'name')->ignore($user->id),
            ],
            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => [
                'confirmed',
                'nullable',
                Password::min(8)
                // ->mixedCase()
                // ->numbers()
                // ->symbols(),
            ],
            'password_confirmation' => 'nullable',
            'avatar' => 'image|mimes:jpg,jpeg,png,gif|max:2048|nullable',
            'fullname' => 'string|max:255|nullable',
            'contact_number' => 'string|max:255|nullable',
            'bio' => 'string|max:255|nullable',
            'facebook_link' => 'string|max:255|nullable',
            'github_link' => 'string|max:255|nullable',
            'youtube_link' => 'string|max:255|nullable',
            'instagram_link' => 'string|max:255|nullable',
            'resume_link' => 'string|max:255|nullable',
            'role_software_id' => 'uuid|nullable',
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
        flash()->option('position', 'top-center')->error($validator->errors()->first());

        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
        );
    }
}
