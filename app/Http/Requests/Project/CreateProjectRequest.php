<?php

namespace App\Http\Requests\Project;

use App\Enum\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProjectRequest extends FormRequest
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
            'category_id' => 'required|uuid|exists:categories,id',
            'cover_image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'name' => 'required|string|max:255|unique:projects,name',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => ['required', Rule::in(values: [Status::Active->value, Status::Inactive->value])],
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
