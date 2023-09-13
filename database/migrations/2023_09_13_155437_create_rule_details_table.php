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
            $table->unsignedBigInteger('RuleID');
            $table->string('KodeFakta', 5);
            $table->foreign('RuleID')->references('id')->on('rule_jurusans')->onDelete('cascade');
            $table->foreign('KodeFakta')->references('KodeFakta')->on('faktas');
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
