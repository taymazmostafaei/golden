<?php

use App\Models\Retail;
use App\Models\RetailOrder;
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
        Schema::create('retail_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(RetailOrder::class);
            $table->foreignIdFor(Retail::class);
            $table->double('price');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retail_order_details');
    }
};
