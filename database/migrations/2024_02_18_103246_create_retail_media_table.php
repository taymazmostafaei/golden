<?php

use App\Models\Retail;
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
        Schema::create('retail_media', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Retail::class);
            $table->string('title');
            $table->string('file_path');
            $table->string('file_size');
            $table->string('file_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retail_media');
    }
};
