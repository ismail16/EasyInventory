<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SupplierInvoiceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($supplierInvoice){
                return [
                    'id' => $supplierInvoice->id,
                    'supplier_id' => $supplierInvoice->supplier_id,
                    'warehouse_id' => $supplierInvoice->warehouse_id,
                    'datepicker_invoice_exp' => $supplierInvoice->datepicker_invoice_exp,
                    'image' => $supplierInvoice->image,
                    'product_name' => $supplierInvoice->product_name,
                    'product_quantity' => $supplierInvoice->product_quantity,
                    'product_rate' => $supplierInvoice->product_rate,
                    'total_price' => $supplierInvoice->total_price,
                    'grand_total_price' => $supplierInvoice->grand_total_price,
                    'paid_amount' => $supplierInvoice->paid_amount,
                    'due_amount' => $supplierInvoice->due_amount,
                    'status' => $supplierInvoice->status
                ];
            })
        ];
//        return parent::toArray($request);
    }
}
