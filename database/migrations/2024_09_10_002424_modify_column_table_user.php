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
    Schema::table('profiles', function (Blueprint $table) {
      $table->string('name')->nullable()->change();
      $table->foreignId('catagory_id')->nullable()->constrained('categories')->change();
      $table->string('gender')->nullable()->change();
      $table->string('slug')->nullable()->change();
      $table->string('phone')->nullable()->change();
      $table->date('birth')->nullable()->change();
      $table->string('city')->nullable()->change();
      $table->string('country')->nullable()->change();
      //
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('profiles', function (Blueprint $table) {
      //
    });
  }
};
