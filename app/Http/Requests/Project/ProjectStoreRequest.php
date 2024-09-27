<?php

namespace App\Http\Requests\Project;

use App\Enums\Project\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectStoreRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'status' => ['required', Rule::enum(Status::class)],
            'staff' => ['required', 'integer', 'exists:users,id'],
            'file' => [
                'nullable',
                'file',
            ]
        ];
    }
}
