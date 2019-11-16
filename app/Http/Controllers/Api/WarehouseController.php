<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WarehouseCollection;
use App\Http\Resources\WarehouseResource;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index()
    {
        return  WarehouseResource::collection(Warehouse::orderBy('id','desc')->paginate(10));
    }

    public function search($field,$query)
    {
        return  WarehouseResource::collection(Warehouse::where($field,'LIKE',"%$query%")->latest()->paginate(10));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'warehouse_name' => 'required'
        ]);

        $Warehouse = new Warehouse;
        $Warehouse->warehouse_name = $request->warehouse_name;
        $Warehouse->save();
        return $Warehouse;
    }

    public function show($id)
    {
        return new WarehouseResource(Warehouse::find($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'warehouse_name' => 'required'
        ]);

        $Warehouse = Warehouse::find($id);
        $Warehouse->warehouse_name = $request->warehouse_name;
        $Warehouse->save();
        return $Warehouse;
    }

    public function destroy($id)
    {
        $Warehouse = Warehouse::find($id);
        $Warehouse->delete();
    }
}
