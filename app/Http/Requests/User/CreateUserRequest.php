<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                // ->mixedCase()
                // ->numbers()
                // ->symbols(),
            ],
            'password_confirmation' => 'required',
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
     * Custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',

            'email.required' => 'Địa chỉ email là bắt buộc.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Địa chỉ email này đã được sử dụng.',

            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',

            'password_confirmation.required' => 'Mật khẩu xác nhận là bắt buộc.',

            'avatar.image' => 'Tệp avatar phải là hình ảnh.',
            'avatar.mimes' => 'Avatar phải có định dạng: jpg, jpeg, png, hoặc gif.',
            'avatar.max' => 'Kích thước avatar không được vượt quá 2MB.',

            'fullname.string' => 'Họ tên phải là một chuỗi ký tự.',
            'fullname.max' => 'Họ tên không được vượt quá 255 ký tự.',

            'contact_number.string' => 'Số liên hệ phải là một chuỗi ký tự.',
            'contact_number.max' => 'Số liên hệ không được vượt quá 255 ký tự.',

            'bio.string' => 'Giới thiệu phải là một chuỗi ký tự.',
            'bio.max' => 'Giới thiệu không được vượt quá 255 ký tự.',

            'facebook_link.string' => 'Liên kết Facebook phải là một chuỗi ký tự.',
            'facebook_link.max' => 'Liên kết Facebook không được vượt quá 255 ký tự.',

            'github_link.string' => 'Liên kết GitHub phải là một chuỗi ký tự.',
            'github_link.max' => 'Liên kết GitHub không được vượt quá 255 ký tự.',

            'youtube_link.string' => 'Liên kết YouTube phải là một chuỗi ký tự.',
            'youtube_link.max' => 'Liên kết YouTube không được vượt quá 255 ký tự.',

            'instagram_link.string' => 'Liên kết Instagram phải là một chuỗi ký tự.',
            'instagram_link.max' => 'Liên kết Instagram không được vượt quá 255 ký tự.',

            'resume_link.string' => 'Liên kết hồ sơ phải là một chuỗi ký tự.',
            'resume_link.max' => 'Liên kết hồ sơ không được vượt quá 255 ký tự.',

            'role_software_id.uuid' => 'ID vai trò phần mềm không hợp lệ.',
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
