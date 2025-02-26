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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id('id_sp');
            $table->string('hinh')->nullable();
            $table->string('hinh_1')->nullable();
            $table->string('hinh_2')->nullable();
            $table->string('ten_sp');
            $table->integer('id_loaisp');
            $table->unsignedInteger('id_nsx');
            $table->integer('luotXem')->nullable();
            $table->integer('soLuong');
            $table->string('loai_go');
            $table->string('kich_thuoc');
            $table->string('mau_sac');
            $table->string('bao_hanh');
            $table->integer('binhluan')->nullable();
            $table->integer('danhgia')->nullable();
            $table->boolean('anHien')->default(1);
            $table->longText('thong_tin')->nullable();
            $table->double('gia_sp');
            $table->integer('luot_mua')->nullable();
            $table->boolean('hot')->default(0);
            $table->double('giaSale')->nullable();
            $table->longText('moTa')->nullable();
            $table->timestamp('ngayDang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};
