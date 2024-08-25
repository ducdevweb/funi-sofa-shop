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
        Schema::create('binhluan', function (Blueprint $table) {
            $table->id('id_bl');
            $table->integer('id_nd');
            $table->string('ten_nd');
            $table->integer('id_sp');
            $table->string('noiDung');
            $table->boolean('anHien')->default(1);
            $table->timestamp('ngayDang')->nullable(); 
            $table->timestamps(); 
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binhluan');
    }
};
