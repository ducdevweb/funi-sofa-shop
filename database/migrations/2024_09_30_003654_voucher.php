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
        Schema::create('voucher', function (Blueprint $table) {
         
            $table->id('id_mgg');
            $table->string('ma_giam_gia'); 
            $table->string('so_tien_giam'); 
            $table->integer('gioi_han_su_dung')->nullable(); 
            $table->boolean('an_hien')->default(0);
            $table->integer('da_su_dung')->default(0); 
            $table->date('ngay_bat_dau')->nullable();
            $table->date('ngay_het_han')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher');
    }
};
