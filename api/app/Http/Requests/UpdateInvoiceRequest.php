<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'number' => 'string|size:9',
            'value' => 'numeric|min:1',
            'issue_date' => 'date|date_format:Y-m-d|before:' . now()->format('Y-m-d'),
            'sender_cnpj' => 'string|cnpj',
            'sender_name' => 'string|max:100',
            'carrier_cnpj' => 'string|cnpj',
            'carrier_name' => 'string|max:100',
        ];
    }
}
