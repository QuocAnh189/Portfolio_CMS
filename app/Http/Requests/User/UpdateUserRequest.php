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
     * Custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'user_id.required' => 'ID người dùng là bắt buộc.',
            'user_id.uuid' => 'ID người dùng phải có định dạng UUID hợp lệ.',

            'profile_id.required' => 'ID hồ sơ là bắt buộc.',
            'profile_id.uuid' => 'ID hồ sơ phải có định dạng UUID hợp lệ.',

            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'name.unique' => 'Tên đã tồn tại trong hệ thống.',

            'email.required' => 'Địa chỉ email là bắt buộc.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.string' => 'Địa chỉ email phải là một chuỗi.',
            'email.max' => 'Địa chỉ email không được vượt quá 255 ký tự.',
            'email.unique' => 'Địa chỉ email đã tồn tại trong hệ thống.',

            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',

            'avatar.image' => 'Ảnh đại diện phải là một hình ảnh.',
            'avatar.mimes' => 'Ảnh đại diện phải có định dạng jpg, jpeg, png, gif.',
            'avatar.max' => 'Ảnh đại diện không được vượt quá 2048 kilobyte.',

            'fullname.string' => 'Họ tên phải là một chuỗi.',
            'fullname.max' => 'Họ tên không được vượt quá 255 ký tự.',

            'contact_number.string' => 'Số điện thoại phải là một chuỗi.',
            'contact_number.max' => 'Số điện thoại không được vượt quá 255 ký tự.',

            'bio.string' => 'Tiểu sử phải là một chuỗi.',
            'bio.max' => 'Tiểu sử không được vượt quá 255 ký tự.',

            'facebook_link.string' => 'Liên kết Facebook phải là một chuỗi.',
            'facebook_link.max' => 'Liên kết Facebook không được vượt quá 255 ký tự.',

            'github_link.string' => 'Liên kết GitHub phải là một chuỗi.',
            'github_link.max' => 'Liên kết GitHub không được vượt quá 255 ký tự.',

            'youtube_link.string' => 'Liên kết YouTube phải là một chuỗi.',
            'youtube_link.max' => 'Liên kết YouTube không được vượt quá 255 ký tự.',

            'instagram_link.string' => 'Liên kết Instagram phải là một chuỗi.',
            'instagram_link.max' => 'Liên kết Instagram không được vượt quá 255 ký tự.',

            'resume_link.string' => 'Liên kết hồ sơ phải là một chuỗi.',
            'resume_link.max' => 'Liên kết hồ sơ không được vượt quá 255 ký tự.',

            'role_software_id.uuid' => 'ID vai trò phần mềm phải có định dạng UUID hợp lệ.',
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
