<?php

namespace App\Http\Requests\Encrypt\Text;

use Illuminate\Foundation\Http\FormRequest;

class StoreEncryptTextRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     */
    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'text' => 'Teks',
        ];
    }
}
