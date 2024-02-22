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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("restaurant_id");
            $table->varchar("name", 50);
            $table->tinyText("picture");
            $table->text("description");
            $table->decimal("price", 5, 2);
            $table->boolean("visible");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
