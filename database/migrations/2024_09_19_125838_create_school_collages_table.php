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
        Schema::create('school_collages', function (Blueprint $table) {
            $table->id();
            $table->string('sc_name');
            $table->string('sc_phone');
            $table->string('email');
            $table->string('sc_address');
            $table->string('sc_established_year');
            $table->string('sc_logo');
            $table->enum('sc_type', ['Public', 'Private'])->default('Public');
            $table->foreignId('university_id')->constrained('universities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_collages');
    }
};
