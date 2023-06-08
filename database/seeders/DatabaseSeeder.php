<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $user = new User([
            "name" => "zakariae",
            "email" => "first@user.com",
            "password" => Hash::make("1234"),
        ]);

        $user->save();

        foreach (["Tangier", "Casa", "Marrakech", "Tetouan"] as $key) {
            DB::insert("INSERT INTO agencies (user_id,name,slug) VALUES (1,?,?);", [
                $key,
                Str::slug($key)
            ]);
        }

        foreach (['Sedan', 'Hatch Back', 'SUV', "Cross Over"] as $key) {
            DB::insert("INSERT INTO categories (user_id,name,slug) VALUES (1,?,?);", [
                $key,
                Str::slug($key)
            ]);
        }
    }
}
