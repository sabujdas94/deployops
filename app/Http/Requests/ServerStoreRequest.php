<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServerStoreRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'ip' => ['required', 'ipv4'],
            'port' => ['required', 'integer'],
            'username' => ['required', 'string'],
            'passkey' => ['required', 'string'],
            'key_type' => ['required', 'in:password,auth_key'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'key_type' => $this->key_type ?: 'password'
        ]);
    }
}
