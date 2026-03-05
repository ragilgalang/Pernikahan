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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('item_type'); // 'Venue' atau 'Vendor'
            $table->unsignedBigInteger('item_id');
            $table->integer('rating_overall')->default(0);
            $table->integer('rating_venue_fasilitas')->default(0);
            $table->integer('rating_katering')->default(0);
            $table->integer('rating_pelayanan')->default(0);
            $table->integer('rating_harga')->default(0);
            $table->text('comment')->nullable();
            $table->json('photos')->nullable();
            $table->boolean('is_anonymous')->default(false);
            $table->timestamps();

            // Link to bookings if necessary, but keep it flexible
            $table->unsignedBigInteger('booking_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
