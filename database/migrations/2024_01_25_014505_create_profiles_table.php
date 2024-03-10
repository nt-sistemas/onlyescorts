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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('user_id')->constrained( 'users')->onDelete('cascade');
            $table->text('about_me')->nullable();
            $table->string('avatar')->nullable();
            $table->string('slide')->nullable();
            $table->string('slug');
            $table->string('phone');
            $table->date('birth');
            $table->string('city');
            $table->string('province')->nullable();
            $table->string('country');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
