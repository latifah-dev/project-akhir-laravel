<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    function index() {
        $transaksi=Transaction::query()->get();
        return response()->json([
            "status"=>true,
            "message"=>"",
            "data"=>$transaksi
        ]);
    }
    public function show($id)
    {
        $transaksi = Transaction::query()->where("id", $id)->first();

        if ($transaksi == null) {
            return response()->json([
                "status" => false,
                "message" => "transaksi tidak ditemukan",
                "data" => null
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $transaksi
        ]);
    }

    public function store(Request $request)
    {
        $payload = $request->all();
        $transaksi = Transaction::query()->create($payload);
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $transaksi
        ]);
    }
    function update($id,Request $request){
        $transaksi = Transaction::query()->where('id',$id)->first();
        if($transaksi == null){
            return response()->json([
                "status" =>false,
                "message" => "data tidak ditemukan",
                "data" => null
            ]);
        }
        $transaksi->fill($request->all());
        $transaksi->save();
        return response()->json([
            'status' => true,
            'message' => 'data telah berubah',
            "data"=> $transaksi
        ]);
    }

    function destroy($id){
        $delete =  Transaction::query()->where("id", $id)->delete();
        return response()->json([
            'status' =>true,
            'message' => 'data telah dihapus'
        ]);
    }
}
