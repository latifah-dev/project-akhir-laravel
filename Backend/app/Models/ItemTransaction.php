<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaksiId');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
