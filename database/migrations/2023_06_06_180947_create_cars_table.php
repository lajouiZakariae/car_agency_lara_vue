<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("make");
            $table->string("model");
            $table->year("year");
            // $table->float("cost");
            $table->float("price");
            // $table->integer("quantity");
            $table->boolean("ready_to_sell");

            // Foreign Keys
            $table->foreignId("user_id")
                ->references("id")
                ->on("users");

            $table->foreignId("agency_id")
                ->references("id")
                ->on("agencies");

            $table->foreignId("category_id")
                ->references("id")
                ->on("categories");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('cars');
    }
};
