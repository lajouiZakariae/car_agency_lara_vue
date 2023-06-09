<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model {
    use HasFactory;

    protected $fillable = [
        "make",
        "model",
        "year",
        "price",
        "ready_to_sell",
        "user_id",
        "agency_id",
        "category_id"
    ];

    static function recentFive() {
        return;
        // return DB::table("cars")
        //     ->orderBy("id", "desc")
        //     ->take(5)
        //     ->get();
    }

    public function agency() {
        return $this->belongsTo(Agency::class);
    }
}
