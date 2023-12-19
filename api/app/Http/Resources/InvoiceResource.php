<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'numero' => $this->number,
            'valor' => number_format($this->value, 2, '.', ','),
            'data_emissao' => $this->issue_date,
            'cnpj_remetente' => $this->sender_cnpj,
            'nome_remetente' => $this->sender_name,
            'cnpj_transportador' => $this->carrier_cnpj,
            'nome_transportador' => $this->carrier_name,
        ];
    }
}
