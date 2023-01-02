<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
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
        $idUser = $request->idUser;
        $transaksi = Transaction::query()->where('IdUser',$idUser)->first();
        if($transaksi == null){
            $newtrans = [
                'IdUser' => $request->input('idUser'),
                'status' => "belum dibayar",               
            ];
            $transaksi = Transaction::query()->create($newtrans);

            $payload = [
                'productId'=> $request->input('productId'),
                'size'=>$request->input('size'),
                'qty'=>$request->input('qty'),
                'subTotal' => $request->input('subTotal'),
                'shipingDate' => $request->input('shipingDate'),
                'shipingAddress'=> $request->input('shipingAddress'),
                'postalCode'=> $request->input('postalCode'),
                'telp'=>$request->input('telp'),
                'greatingCart'=>$request->input('greatingCart'),
                'transaksiId'=> $transaksi->id,
                'status' => "unpaid",    
            ];
            $item = ItemTransaction::query()->create($payload);
            return response()->json([
                "status" => true,
                "message" => "",
                "data" => $item
            ]);
        };
        if(!$transaksi == null){
            $payload = [
                'productId'=> $request->input('productId'),
                'size'=>$request->input('size'),
                'qty'=>$request->input('qty'),
                'subTotal' => $request->input('subTotal'),
                'shipingDate' => $request->input('shipingDate'),
                'shipingAddress'=> $request->input('shipingAddress'),
                'postalCode'=> $request->input('postalCode'),
                'telp'=>$request->input('telp'),
                'greatingCart'=>$request->input('greatingCart'),
                'transaksiId'=> $transaksi->id,
                'status' => "unpaid",    
            ];
            $item = ItemTransaction::query()->create($payload);
            return response()->json([
                "status" => true,
                "message" => "",
                "data" => $item
            ]);
        };
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
