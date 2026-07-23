<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequestForm extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:20'],
            'service_type' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:200'],
            'message' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
