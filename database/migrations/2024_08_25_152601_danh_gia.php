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
        Schema::create('danhgia', function (Blueprint $table) {
            $table->id('id_dg');
            $table->integer('id_sp');
            $table->integer('id_nd');
            $table->double('danhGia')->nullable(); 
            $table->timestamp('ngayDang')->nullable(); 
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhgia');
    }
};
