<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return  DefaultResource::collection(Category::orderBy('id','desc')->paginate(10));
    }

    public function search($field,$query)
    {
        return  DefaultResource::collection(Category::where($field,'LIKE',"%$query%")->latest()->paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        $Category = new Category;
        $Category->category_name = $request->category_name;
        $Category->save();
        return $Category;
    }

    public function show($id)
    {
        return new DefaultResource(Category::find($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        $Category = Category::find($id);
        $Category->category_name = $request->category_name;
        $Category->save();
        return $Category;
    }

    public function destroy($id)
    {
        $Category = Category::find($id);
        $Category->delete();
    }
}
