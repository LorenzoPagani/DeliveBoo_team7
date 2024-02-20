<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurants_types', function (Blueprint $table) {
            $table->unsignedBigInteger("restaurant_id");
            $table->unsignedBigInteger("type_id");

            $table->foreign("restaurant_id")->references("id")->on("restaurants")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("type_id")->references("id")->on("types")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants_types');
    }
};