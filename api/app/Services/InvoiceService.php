<?php

namespace App\Services;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;

class InvoiceService
{
    public function createInvoice(StoreInvoiceRequest $request)
    {
        return Invoice::create([
            'user_id' => auth()->id(),
            'number' => $request->input('number'),
            'value' => $request->input('value'),
            'issue_date' => $request->input('issue_date'),
            'sender_cnpj' => $request->input('sender_cnpj'),
            'sender_name' => $request->input('sender_name'),
            'carrier_cnpj' => $request->input('carrier_cnpj'),
            'carrier_name' => $request->input('carrier_name'),
        ]);
    }

    public function findInvoice($number)
    {
        return Invoice::where('number', $number)->first();
    }

    public function updateInvoice(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->updateOrFail($request->all());
        return $invoice;
    }

    public function deleteInvoice(Invoice $invoice)
    {
        $invoice->deleteOrFail();
        return $invoice;
    }
}
