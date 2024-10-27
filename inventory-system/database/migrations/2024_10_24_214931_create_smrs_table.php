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
        Schema::create('s_m_r_s', function (Blueprint $table) {
           
        $table->id();
            $table->string('smr_number')->unique();
            $table->foreignId('po_id')->constrained('p_o_s')->onDelete('cascade');
            $table->string('site_code');
            $table->string('snd_person');
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_m_r_s');
    }
};
