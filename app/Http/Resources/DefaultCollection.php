<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DefaultCollection extends ResourceCollection
{
    public function toArray($request)
    {
        // return [
        //     'data' => $this->collection->transform(function ($category){
        //         return [
        //             'id' => $category->id,
        //             'supplier_name' => $category->category_name,
        //         ];
        //     })
        // ];
       return parent::toArray($request);
    }
}
