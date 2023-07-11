<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'status',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'userId');
    }

    public function history_details(){
        return $this->hasMany(HistoryDetail::class, 'historyId');
    }
}
