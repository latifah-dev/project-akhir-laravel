<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemTransaction;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function itemtransaction()
    {
        return $this->hasMany(ItemTransaction::class);
    }
}
