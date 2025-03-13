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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
        });//
        /* 
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post');
            $table->int('user_id');
        });//
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->string('reply');
            $table->int('post_id');
            $table->int('user_id');
            $table->int('hierarchy');
        });//*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');//
    }
};
