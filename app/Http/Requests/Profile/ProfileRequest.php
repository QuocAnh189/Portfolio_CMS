<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $profile = $this->user()->profile;

        if ($this->input('name') === $profile->user->name) {
            $this->request->remove('name');
        }

        if ($this->input('email') === $profile->user->email) {
            $this->request->remove('email');
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|uuid',
            'user_id' => 'required|uuid',
            'avatar' => 'image|mimes:jpg,jpeg,png,gif|max:2048|nullable',
            'fullname' => 'string|nullable',
            'contact_number' => 'string|nullable',
            'bio' => 'string|nullable',
            'facebook_link' => 'string|nullable',
            'youtube_link' => 'string|nullable',
            'github_link' => 'string|nullable',
            'instagram_link' => 'string|nullable',
            'resume_link' => 'string|nullable',
            'name' => [
                'sometimes',
                'string',
                'max:255',
                'unique:users,name,'
            ],
            'email' => [
                'sometimes',
                'email',
                'max:255',
                'unique:users,email,'
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Tên người dùng đã tồn tại',
            'email.unique' => 'Email đã tồn tại',
        ];
    }
}
