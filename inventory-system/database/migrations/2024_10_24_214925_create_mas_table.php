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
        Schema::create('m_a_s', function (Blueprint $table) {
        $table->id();
        $table->string('ma_number');
        $table->foreignId('po_id')->constrained('p_o_s')->onDelete('cascade'); // Foreign key to po
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_a_s');
    }
};
