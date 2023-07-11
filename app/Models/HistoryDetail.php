<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HistoryDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'historyId',
        'clothesId',
        'quantity',
    ];

    public $timestamps = false;

    public function histories(){
        return $this->belongsTo(History::class, 'historyId');
    }

    public function clothes(){
        return $this->belongsTo(Clothes::class, 'clothesId');
    }

    public static function history_details_join_clothes(){
        return DB::table('history_details as h')
                ->join('clothes as c', 'h.clothesId', '=', 'c.id')
                ->select('h.*', 'c.name', 'c.desc', 'c.price', 'c.stock', 'c.image')
                ->get();
    }
}
