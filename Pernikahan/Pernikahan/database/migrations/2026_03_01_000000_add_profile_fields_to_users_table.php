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
        Schema::table('users', function (Blueprint $column) {
            $column->string('first_name')->nullable();
            $column->string('last_name')->nullable();
            $column->string('username')->unique()->nullable();
            $column->enum('gender', ['Pria', 'Wanita', 'Lainnya'])->nullable();
            $column->string('phone')->nullable();
            $column->string('location')->nullable();
            $column->text('bio')->nullable();
            $column->string('favorite_wedding_type')->nullable();
            $column->string('average_budget')->nullable();
            $column->string('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $column) {
            $column->dropColumn([
                'first_name',
                'last_name',
                'username',
                'gender',
                'phone',
                'location',
                'bio',
                'favorite_wedding_type',
                'average_budget',
                'avatar',
            ]);
        });
    }
};
