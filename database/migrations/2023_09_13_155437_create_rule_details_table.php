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
        Schema::create('rule_details', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jurusan', 5);
            $table->string('kode_fakta', 5);
            $table->foreign('kode_jurusan')->references('kode_jurusan')->on('jurusans');
            $table->foreign('kode_fakta')->references('kode_fakta')->on('faktas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rule_details');
    }
};
