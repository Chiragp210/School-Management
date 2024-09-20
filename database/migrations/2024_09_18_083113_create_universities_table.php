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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('uni_name');
            $table->string('uni_website');
            $table->string('uni_phone');
            $table->string('email');
            $table->string('uni_address');
            $table->string('uni_established_year');
            $table->string('uni_logo');
            $table->enum('uni_type',['Deemed','State','Central','Private'])->default('Deemed');
            $table->text('uni_description');
            $table->boolean('uni_verifid')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
