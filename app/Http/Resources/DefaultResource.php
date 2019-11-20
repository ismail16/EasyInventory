<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DefaultResource extends JsonResource
{

    public function toArray($request)
    {
        // return [
        //     'id' => $this->id,
        //     'category_name' => $this->category_name,
        // ];

       return parent::toArray($request);
    }
}
