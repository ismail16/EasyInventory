<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SupplierCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($supplier){
                return [
                    'id' => $supplier->id,
                    'supplier_name' => $supplier->supplier_name,
                    'supplier_contact_name' => $supplier->supplier_contact_name,
                    'supplier_email' => $supplier->supplier_email,
                    'supplier_phone' => $supplier->supplier_phone,
                    'supplier_address' => $supplier->supplier_address,
                ];
            })
        ];
//        return parent::toArray($request);
    }
}
