<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
            'number' => 'required|string|size:9',
            'value' => 'required|numeric|min:1',
            'issue_date' => 'required|date|date_format:Y-m-d|before:' . now()->format('Y-m-d'),
            'sender_cnpj' => 'required|string|cnpj',
            'sender_name' => 'required|string|max:100',
            'carrier_cnpj' => 'required|string|cnpj',
            'carrier_name' => 'required|string|max:100',
        ];
    }
}
