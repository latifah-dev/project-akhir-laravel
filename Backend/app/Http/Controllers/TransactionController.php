<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\ItemTransaction;
use App\Models\Product;

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
        $itemTransactions = ItemTransaction::query()->where('transaksiId', $id)->get();

        $productIds = $itemTransactions->pluck('productId');
        $products = Product::query()->whereIn('id', $productIds)->get();

        $keranjang = [];
        foreach ($itemTransactions as $itemTransaction) {
        $product = $products->where('id', $itemTransaction->productId)->first();
        $keranjang[] = [
            "itemTransaction" => $itemTransaction,
            "product" => $product
        ];
    }
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
            "data" => $keranjang
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
        $newName = "";
        $extension = $request->file('photo')->getClientOriginalExtension();
        $newName = $request->id.'-'.now()->timestamp.'.'.$extension;
        $request->file('photo')->storeAs('public/images', $newName);
        $request['buktiPembayaran']=$newName;
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
