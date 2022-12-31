<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemTransaction;

class ItemTransactionController extends Controller
{
    function index() {
        $item=ItemTransaction::query()->get();
        return response()->json([
            "status"=>true,
            "message"=>"",
            "data"=>$item
        ]);
    }
    public function show($id)
    {
        $item = ItemTransaction::query()->where("id", $id)->first();

        if ($item == null) {
            return response()->json([
                "status" => false,
                "message" => "item tidak ditemukan",
                "data" => null
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $item
        ]);
    }

    public function store(Request $request)
    {
        $payload = $request->all();
        $item = ItemTransaction::query()->create($payload);
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $item
        ]);
    }
    function update($id,Request $request){
        $item = ItemTransaction::query()->where('id',$id)->first();
        if($item == null){
            return response()->json([
                "status" =>false,
                "message" => "data tidak ditemukan",
                "data" => null
            ]);
        }
        $item->fill($request->all());
        $item->save();
        return response()->json([
            'status' => true,
            'message' => 'data telah berubah',
            "data"=> $item
        ]);
    }

    function destroy($id){
        $delete =  ItemTransaction::query()->where("id", $id)->delete();
        return response()->json([
            'status' =>true,
            'message' => 'data telah dihapus'
        ]);
    }
}
