<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index()
    {
        return  DefaultResource::collection(Warehouse::orderBy('id','desc')->paginate(10));
    }

    public function allWarehouse()
    {
        return  DefaultResource::collection(Warehouse::orderBy('id','desc')->get());
    }

    public function search($field,$query)
    {
        return  DefaultResource::collection(Warehouse::where($field,'LIKE',"%$query%")->latest()->paginate(10));
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
        return new DefaultResource(Warehouse::find($id));
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
