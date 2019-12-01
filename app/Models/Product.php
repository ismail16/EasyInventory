<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function supplier() {
        return $this->belongsTo('App\Models\Supplier');
    }
}
