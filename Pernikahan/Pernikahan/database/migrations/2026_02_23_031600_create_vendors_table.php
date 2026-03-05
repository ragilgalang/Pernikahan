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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('owner');
            $table->string('location');
            $table->string('price');
            $table->string('image');
            $table->decimal('rating', 3, 2)->default(0);
            $table->string('type');
            $table->text('about')->nullable();
            $table->json('features')->nullable();
            $table->json('categories')->nullable();
            $table->json('testimonials')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
