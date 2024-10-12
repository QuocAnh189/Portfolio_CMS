<?php

namespace App\Http\Requests\Experience;

use App\Domains\Experience\Models\Experience;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateExperienceRequest extends FormRequest
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
            'company_name' => 'required|string',
            'job_title' => 'required|string',
            'job_description' => 'required|string',
            'level' => ['required', Rule::in(Experience::$levels)],
            'is_current' => 'required|boolean',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => ['required', Rule::in(['active', 'inactive'])],
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
            'user_id.required' => 'User ID là bắt buộc.',
            'user_id.uuid' => 'User ID phải là một UUID hợp lệ.',
            'user_id.exists' => 'User ID không tồn tại trong danh sách người dùng.',

            'role_software_id.required' => 'Role Software ID là bắt buộc.',
            'role_software_id.uuid' => 'Role Software ID phải là một UUID hợp lệ.',
            'role_software_id.exists' => 'Role Software ID không tồn tại trong danh sách vai trò phần mềm.',

            'company_name.required' => 'Tên công ty là bắt buộc.',
            'company_name.string' => 'Tên công ty phải là một chuỗi.',

            'job_title.required' => 'Chức danh công việc là bắt buộc.',
            'job_title.string' => 'Chức danh công việc phải là một chuỗi.',

            'job_description.required' => 'Mô tả công việc là bắt buộc.',
            'job_description.string' => 'Mô tả công việc phải là một chuỗi.',

            'level.required' => 'Cấp độ là bắt buộc.',
            'level.in' => 'Cấp độ phải nằm trong danh sách hợp lệ.',

            'is_current.required' => 'Trạng thái hiện tại là bắt buộc.',
            'is_current.boolean' => 'Trạng thái hiện tại phải là true hoặc false.',

            'start_date.required' => 'Ngày bắt đầu là bắt buộc.',
            'start_date.date' => 'Ngày bắt đầu phải là một ngày hợp lệ.',

            'end_date.required' => 'Ngày kết thúc là bắt buộc.',
            'end_date.date' => 'Ngày kết thúc phải là một ngày hợp lệ.',

            'status.required' => 'Trạng thái là bắt buộc.',
            'status.in' => 'Trạng thái phải là active hoặc inactive.',
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
