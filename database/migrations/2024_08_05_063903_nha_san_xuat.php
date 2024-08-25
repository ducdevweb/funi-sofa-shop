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
        Schema::create('nsx', function (Blueprint $table) {
            $table->id('id_nsx');
            $table->boolean('anHien')->default(1);
            $table->integer('thuTu');
            $table->string('ten_nsx');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nsx');
    }
};
