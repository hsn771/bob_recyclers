<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'title_1' => 'required|string|max:300',
            'title_2' => 'required|string|max:300',
            'title_3' => 'required|string|max:300',
            'title_4' => 'required|string|max:300',
            'number_1' => 'required|string|max:300',
            'number_2' => 'required|string|max:300',
            'number_3' => 'required|string|max:300',
            'number_4' => 'required|string|max:300',
            'short_description' => 'required|string|max:600',
        ];
    }
}
