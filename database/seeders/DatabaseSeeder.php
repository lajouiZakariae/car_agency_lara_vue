<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        (new User([
            "name" => "zakariae",
            "email" => "first@user.com",
            "password" => Hash::make("1234"),
        ]))->save();

        foreach (["Tangier", "Casa", "Marrakech", "Tetouan"] as $key)
            DB::table("agencies")->insert(["user_id" => 1, "name" => $key, "slug" => Str::slug($key), "created_at" => Date::now(), "updated_at" => Date::now()]);

        foreach (['Sedan', 'Hatch Back', 'SUV', "Cross Over"] as $key)
            DB::table("body_styles")->insert(["user_id" => 1, "name" => $key, "slug" => Str::slug($key), "created_at" => Date::now(), "updated_at" => Date::now()]);

        foreach (File::json(base_path() . "\sql\cars.json") as $car)
            DB::table("cars")->insert(array_merge($car, ["user_id" => 1, "created_at" => Date::now(), "updated_at" => Date::now()]));
    }
}
