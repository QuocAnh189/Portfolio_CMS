<?php

namespace App\Http\Requests\ProjectTechnologies;

use App\Enum\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProjectTechnologiesRequest extends FormRequest
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
            'project_id' => ['required', 'uuid', 'exists:projects,id'],
            'technology_id' => ['required', 'uuid', 'exists:technologies,id'],
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
            'project_id.required' => 'ID dự án là bắt buộc.',
            'project_id.uuid' => 'ID dự án phải là một UUID hợp lệ.',
            'project_id.exists' => 'ID dự án không tồn tại.',

            'technology_id.required' => 'ID công nghệ là bắt buộc.',
            'technology_id.uuid' => 'ID công nghệ phải là một UUID hợp lệ.',
            'technology_id.exists' => 'ID công nghệ không tồn tại.',

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
