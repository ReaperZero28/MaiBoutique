<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'cartId',
        'clothesId',
        'quantity',
    ];

    public $timestamps = false;

    public function carts(){
        return $this->belongsTo(Cart::class, 'cartId');
    }

    public function clothes(){
        return $this->belongsTo(Clothes::class, 'clothesId');
    }
}
