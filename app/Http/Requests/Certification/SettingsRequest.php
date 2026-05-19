<?php

namespace App\Http\Requests\Certification;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'intro_text' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ];
    }
}
