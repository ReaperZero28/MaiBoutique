<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'price',
        'stock',
        'image',
    ];

    public function cart_details(){
        return $this->hasMany(CartDetail::class, 'transactionId');
    }

    public function history_details(){
        return $this->hasMany(HistoryDetail::class, 'transactionId');
    }
}
