<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
    ];

    public $timestamps = false;

    public function users(){
        return $this->belongsTo(User::class, 'userId');
    }

    public function cart_details(){
        return $this->hasMany(CartDetail::class, 'cartId');
    }
}
