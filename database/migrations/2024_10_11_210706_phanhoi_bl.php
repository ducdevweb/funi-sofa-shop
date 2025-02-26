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
        Schema::create('phanhoi_bl', function (Blueprint $table) {
            $table->id('id_phbl');
            $table->text('phanhoi');
            $table->text('ten_nd');
            $table->integer('id_bl');
            $table->integer('id_nd');
            $table->timestamp('ngayDang');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
