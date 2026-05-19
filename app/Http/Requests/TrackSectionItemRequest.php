<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackSectionItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $photoRule = $this->isMethod('post') ? 'required' : 'nullable';

        return [
            'track_section_id' => 'required|exists:track_sections,id',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'photo' => $photoRule . '|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'sort_order' => 'nullable|integer|min:0',
        ];
    }
}
