<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagementRequest extends FormRequest
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
            'top_management_title' => 'required|string',
            'mid_management_title' => 'required|string',
            'yard_management_title' => 'required|string',
            'top_description' => 'required|string',
            'mid_description' => 'required|string',
            'yard_description' => 'required|string',
        ];
    }
}
