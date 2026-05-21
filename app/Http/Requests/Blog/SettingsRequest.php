<?php

namespace App\Http\Requests\Blog;

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
            'page_title' => 'required|string|max:120',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ];
    }
}
