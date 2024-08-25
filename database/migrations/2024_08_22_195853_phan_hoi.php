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
        Schema::create('phanhoi', function (Blueprint $table) {
            $table->id('id_ph');
            $table->integer('id_user');
            $table->string('ho_ten');
            $table->string('email');
            $table->longText('loi_nhan');
            $table->dateTime('ngay_gui');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phanhoi');
    }
};
