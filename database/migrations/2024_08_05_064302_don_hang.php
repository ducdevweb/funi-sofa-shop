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
        Schema::create('donhang', function (Blueprint $table) {
            $table->id('id_dh');
            $table->integer('id_nd');
            $table->string('maDon');
            $table->string('nguoiNhan');
            $table->integer('soDienThoai');
            $table->boolean('trangThai');
            $table->string('diaChi');
            $table->boolean('thanhToan')->default(0);
            $table->string('hinhThanhToan')->nullable();
            $table->longText('ghiChu')->nullable();
            $table->timestamp('ngayMua');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donhang');
    }
};
