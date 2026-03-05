<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class AddNewRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'required|string|max:300',
            'email_address' => 'required|string|max:60',
            'contact_no' => 'required|string|max:40',
        ];
    }
}
