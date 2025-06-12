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
        Schema::create('about_us_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('photo');
            $table->enum('position', ['atas-kiri', 'atas-kanan', 'tengah-kiri','tengah-kanan','bawah']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_galleries');
    }
};
