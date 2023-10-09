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
        Schema::create('test_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->string('kode_fakta');
            $table->foreign('kode_fakta')->references('kode_fakta')->on('faktas')->onDelete('cascade');
            $table->boolean('is_true');
            $table->timestamps();
            $table->softDeletes();
        });;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_details');
    }
};
