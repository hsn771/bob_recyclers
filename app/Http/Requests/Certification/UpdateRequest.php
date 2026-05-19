<?php

namespace App\Http\Requests\Certification;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:500',
            'pdf' => 'nullable|file|mimes:pdf|max:10240',
            'description' => 'nullable|string|max:2000',
            'rank' => 'nullable|integer|min:0',
        ];
    }
}
