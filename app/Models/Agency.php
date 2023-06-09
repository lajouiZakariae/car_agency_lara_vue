<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Agency extends Model {
    use HasFactory;

    protected $fillable = ["name", "slug", "user_id"];

    public function cars() {
        return $this->hasMany(Car::class);
    }

    public function recentFiveCars() {
        return $this->cars()->limit(5);
    }

    public static function allWithCarCount() {
        return DB::table("agencies")
            ->join("cars", "cars.agency_id", "=", "agencies.id")
            ->selectRaw("
            agencies.id,
            agencies.name,
            count(cars.id) as car_count")
            ->groupBy("agencies.id")
            ->get();
    }
}
