<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;

class ProductController extends Controller
{

   public function index()
    {
        return  DefaultResource::collection(Product::orderBy('id','desc')->paginate(10));
    }

    public function search($field,$query)
    {
        return  DefaultResource::collection(Product::where($field,'LIKE',"%$query%")->latest()->paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'product_qty' => 'required',
            'supplier_id' => 'required',
            'supplier_price' => 'required'
        ]);
        $product = new Product;        
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->warehouse_id = $request->warehouse_id;
        $product->product_qty = $request->product_qty;
        $product->supplier_price = $request->supplier_price;
        $product->sell_price = $request->sell_price;
        $product->mfg_date = $request->mfg_date;
        $product->exp_date = $request->exp_date;
        $product->product_detail = $request->product_detail;
        $product->model = $request->model;
        $product->sku = str_slug($request->product_name);
        $product->status = 1;
        if($request->image){
            $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            \Image::make($request->image)->save(public_path('images/product/').$name);
            $request->merge(['image' => $name]);
        }else{
            $name = 'default.png';
        }
        $product->image = $name ;
        $product->save();
        return $product;
    }

    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        $product_req = $request->product;
        // $product = $product_t->product;    
        $product->product_name = $product_req['product_name'];
        $product->category_id = $product_req['category_id'];
        $product->supplier_id = $product_req['supplier_id'];
        $product->warehouse_id = $product_req['warehouse_id'];
        $product->product_qty = $product_req['product_qty'];
        $product->supplier_price = $product_req['supplier_price'];
        $product->sell_price = $product_req['sell_price'];
        $product->mfg_date = $product_req['mfg_date'];
        $product->exp_date = $product_req['exp_date'];
        $product->product_detail = $product_req['product_detail'];
        $product->model = $product_req['model'];
        $product->sku = str_slug($product_req['product_name']);
        $product->status = 1;

        // if($product_req['image']){

        //     $productImage = public_path('images/product/').$product->image;
        //     if(file_exists($productImage)){
        //         @unlink($productImage);
        //     }
            // $name = time().'.' . explode('/', explode(':', substr($product_req['image'], 0, strpos($product_req['image'], ';')))[1])[1];

        //     return $name;

        //     \Image::make($product_req['image'])->save(public_path('images/product/').$name);
        //     $product_req->merge(['image' => $name]);
        // }else{
        //     $name = 'default.png';
        // }

        // $product->image = $name ;
        $product->save();
        return $product;
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $productImage = public_path('images/product/').$product->image;
        if(file_exists($productImage)){
            @unlink($productImage);
        }
        $product->delete();
    }
}
