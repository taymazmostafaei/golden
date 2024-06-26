<?php

use App\Models\User;
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
        Schema::create('melteds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->enum('type', ['buy', 'sell']);
            $table->double('amount');
            $table->double('price');
            $table->float('grams');
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('melteds');
    }
};
