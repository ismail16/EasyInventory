<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierInvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'warehouse_id' => $this->warehouse_id,
            'supplier_id' => $this->supplier_id,
            'datepicker_invoice_exp' => $this->datepicker_invoice_exp,
            'image' => $this->image,
            'product_name' => $this->product_name,
            'product_quantity' => $this->product_quantity,
            'product_rate' => $this->product_rate,
            'total_price' => $this->total_price,
            'grand_total_price' => $this->grand_total_price,
            'paid_amount' => $this->paid_amount,
            'due_amount' => $this->due_amount,
            'status' => $this->status
        ];

//        return parent::toArray($request);
    }
}
