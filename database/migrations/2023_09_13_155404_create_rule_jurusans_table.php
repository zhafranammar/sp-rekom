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
        Schema::create('rule_jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('KodeJurusan', 5);
            $table->foreign('KodeJurusan')->references('KodeJurusan')->on('jurusans');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rule_jurusans');
    }
};
