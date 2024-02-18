<?php

use App\Models\RetailCategory;
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
        Schema::create('retails', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(RetailCategory::class);
            $table->string('product_code')->nullable();
            $table->string('name');
            $table->double('price')->nullable();
            $table->double('exsist')->nullable();
            $table->string('desc');
            $table->string('brand')->nullable();
            $table->text('content');
            $table->json('moreoptions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retails');
    }
};
