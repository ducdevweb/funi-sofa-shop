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
        Schema::create('chitiet', function (Blueprint $table) {
            $table->id('id_ct');
            $table->integer('id_dh');
            $table->integer('id_sp');
            $table->double('gia_sp');
            $table->string('hinh');
            $table->string('ten_sp');
            $table->integer('soLuong');
            $table->integer('thanh_tien');
            $table->double('tongTien');
            $table->tinyInteger('thanhToan')->default(0);
            $table->dateTime('ngayNhan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitiet');
    }
};
