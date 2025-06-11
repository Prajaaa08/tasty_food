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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('news_access')->default(false);
            $table->boolean('menu_access')->default(false);
            $table->boolean('about_us_access')->default(false);
            $table->boolean('about_us_gallery_access')->default(false);
            $table->boolean('slider_gallery_access')->default(false);
            $table->boolean('users_access')->default(false);
            $table->boolean('gallery_access')->default(false);
            $table->boolean('contact_access')->default(false);
            $table->boolean('business_information_access')->default(false);
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
