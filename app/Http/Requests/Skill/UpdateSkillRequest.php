<?php

namespace App\Http\Requests\Skill;

use App\Enum\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateSkillRequest extends FormRequest
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
            'user_id' => 'required|uuid|exists:users,id',
            'role_software_id' => 'required|uuid|exists:role_software,id',
            'description' => 'required|string',
            'status' => ['required', Rule::in([Status::Active->value, Status::Inactive->value])],
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
            'user_id.uuid' => 'ID người dùng phải là định dạng UUID hợp lệ.',
            'user_id.exists' => 'ID người dùng không tồn tại trong hệ thống.',

            'role_software_id.required' => 'ID vai trò phần mềm là bắt buộc.',
            'role_software_id.uuid' => 'ID vai trò phần mềm phải là định dạng UUID hợp lệ.',
            'role_software_id.exists' => 'ID vai trò phần mềm không tồn tại trong hệ thống.',

            'description.required' => 'Mô tả là bắt buộc.',
            'description.string' => 'Mô tả phải là một chuỗi ký tự.',

            'status.required' => 'Trạng thái là bắt buộc.',
            'status.in' => 'Trạng thái phải là ' . Status::Active->value . ' hoặc ' . Status::Inactive->value . '.',
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
