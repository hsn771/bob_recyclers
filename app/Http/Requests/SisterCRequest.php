<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SisterCRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'about_us' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ];
    }
}
