<?php

namespace App\Http\Requests\Education;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateEducationRequest extends FormRequest
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
            'major_id' => 'required|uuid|exists:majors,id',
            'gpa' => 'required|numeric',
            'logo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'university_name' => 'required|string',
            'description' => 'string|nullable',
            'degree' => 'required|boolean',
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

            'major_id.required' => 'Major ID là bắt buộc.',
            'major_id.uuid' => 'Major ID phải là một UUID hợp lệ.',
            'major_id.exists' => 'Major ID không tồn tại trong danh sách các chuyên ngành.',

            'gpa.required' => 'GPA là bắt buộc.',
            'gpa.numeric' => 'GPA phải là một số hợp lệ.',

            'logo.required' => 'Logo là bắt buộc.',
            'logo.image' => 'Logo phải là một hình ảnh.',
            'logo.mimes' => 'Logo phải có định dạng jpg, jpeg, png hoặc gif.',
            'logo.max' => 'Logo không được vượt quá 2048 KB.',

            'university_name.required' => 'Tên trường đại học là bắt buộc.',
            'university_name.string' => 'Tên trường đại học phải là một chuỗi.',

            'description.string' => 'Mô tả phải là một chuỗi.',

            'degree.required' => 'Degree là bắt buộc.',
            'degree.boolean' => 'Degree phải là true hoặc false.',

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
