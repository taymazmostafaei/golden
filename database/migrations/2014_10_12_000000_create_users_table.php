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
            $table->string('firtname');
            $table->string('lastname');
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('telphone');
            $table->string('national_id')->unique();
            $table->string('cert');
            $table->enum('role',['user','admin','global'])->default('user');
            $table->enum('status', ['verify','wait','reject']);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
