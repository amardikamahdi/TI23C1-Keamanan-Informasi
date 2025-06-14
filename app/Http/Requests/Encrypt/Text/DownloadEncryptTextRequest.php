<?php

namespace App\Http\Requests\Encrypt\Text;

use Illuminate\Foundation\Http\FormRequest;

class DownloadEncryptTextRequest extends FormRequest
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
            'key' => ['required', 'string', 'min:8'],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     */
    public function attributes(): array
    {
        return [
            'key' => 'Kunci Enkripsi',
        ];
    }
}
