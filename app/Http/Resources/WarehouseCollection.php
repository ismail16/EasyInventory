<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WarehouseCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($warehouse){
                return [
                    'id' => $warehouse->id,
                    'warehouse_name' => $warehouse->warehouse_name,
                ];
            })
        ];
//        return parent::toArray($request);
    }
}
