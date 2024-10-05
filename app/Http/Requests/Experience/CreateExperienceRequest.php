<?php

namespace App\Http\Requests\Experience;

use App\Domains\Experience\Models\Experience;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateExperienceRequest extends FormRequest
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
