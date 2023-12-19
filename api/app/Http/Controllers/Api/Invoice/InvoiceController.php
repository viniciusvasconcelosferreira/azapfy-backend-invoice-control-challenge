<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Notifications\InvoiceCreatedNotification;
use App\Services\InvoiceService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{
    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->middleware('auth:sanctum');
        $this->invoiceService = $invoiceService;
    }

    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', Invoice::class);

        $invoices = Auth::user()->invoices;

        return InvoiceResource::collection($invoices);
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(StoreInvoiceRequest $request)
    {
        $this->authorize('create', Invoice::class);

        $invoice = $this->invoiceService->createInvoice($request);

        try {
            $user = auth()->user();
            $user->notify(new InvoiceCreatedNotification($invoice));

            $invoiceResource = new InvoiceResource($invoice);
            $invoiceResource->message = 'Invoice created successfully';
            return $invoiceResource;
        } catch (\Exception $e) {
            Log::error('Error sending notification: ' . $e->getMessage());

            // Continuar com a resposta do recurso da nota fiscal
            $invoiceResource = new InvoiceResource($invoice);
            $invoiceResource->message = 'Invoice created successfully (notification failed)';
            return $invoiceResource;
        }

    }

    /**
     * Display the specified resource.
     * @throws AuthorizationException
     */
    public function show($number)
    {
        $invoice = $this->invoiceService->findInvoice($number);

        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], 404);
        }

        $this->authorize('view', $invoice);

        return new InvoiceResource($invoice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, $number)
    {
        $invoice = $this->invoiceService->findInvoice($number);

        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], 404);
        }

        $this->authorize('update', $invoice);

        $invoice = $this->invoiceService->updateInvoice($request, $invoice);

        $invoiceResource = new InvoiceResource($invoice);
        $invoiceResource->message = 'Invoice updated successfully';

        return $invoiceResource;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($number)
    {
        $invoice = $this->invoiceService->findInvoice($number);

        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], 404);
        }

        $this->authorize('delete', $invoice);

        $invoice = $this->invoiceService->deleteInvoice($invoice);

        $invoiceResource = new InvoiceResource($invoice);
        $invoiceResource->message = 'Invoice deleted successfully';

        return $invoiceResource;
    }
}
