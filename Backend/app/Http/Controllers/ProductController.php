<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index() {
        $product=Product::query()->get();
        
        return response()->json([
            "status"=>true,
            "message"=>"",
            "data"=>$product
        ]);
    }
    public function show($id)
    {
        $product = Product::query()->where("id", $id)->first();

        if ($product == null) {
            return response()->json([
                "status" => false,
                "message" => "product tidak ditemukan",
                "data" => null
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $product
        ]);
    }

    public function store(Request $request)
    {
        $newName = "";
        $extension = $request->file('photo')->getClientOriginalExtension();
        $newName = $request->nameProduct.'-'.now()->timestamp.'.'.$extension;
        $request->file('photo')->storeAs('public/images', $newName);
        $request['image']=$newName;

        $payload = $request->all();
        $product = Product::query()->create($payload);
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $product
        ]);
    }
    function update($id,Request $request){
        if($request->file('photo')) {
        $newName = "";
        $extension = $request->file('photo')->getClientOriginalExtension();
        $newName = $request->nameProduct.'-'.now()->timestamp.'.'.$extension;
        $request->file('photo')->storeAs('public/images', $newName);
        $request['image']=$newName;
        }
        $product = Product::query()->where('id',$id)->first();
        if($product == null){
            return response()->json([
                "status" =>false,
                "message" => "data tidak ditemukan",
                "data" => null
            ]);
        }
        $product->fill($request->all());
        $product->save();
        return response()->json([
            'status' => true,
            'message' => 'data telah berubah',
            "data"=> $product
        ]);
    }

    function destroy($id){
        $delete =  Product::query()->where("id", $id)->delete();
        return response()->json([
            'status' =>true,
            'message' => 'data telah dihapus'
        ]);
    }
}
