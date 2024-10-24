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
        Schema::create('item_smr', function (Blueprint $table) {
            $table->id();
        $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
        $table->foreignId('smr_id')->constrained('s_m_r_s')->onDelete('cascade');
        $table->integer('quantity');
        $table->boolean('received')->default(false); // Indicates whether the item was received
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_smr');
    }
};
