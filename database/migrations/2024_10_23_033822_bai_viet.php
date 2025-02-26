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
        Schema::create('baiviet', function (Blueprint $table) {
            $table->id('id_bv');
            $table->string('tieu_de');
            $table->string('hinh_bv');
            $table->integer('id_nd');
            $table->string('tac_gia');
            $table->string('noi_dung');
            $table->timestamp('ngay_dang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baiviet');
    }
};
