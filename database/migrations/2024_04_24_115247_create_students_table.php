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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('reg_number')->unique();
            $table->string('programme_enrolled');
            $table->integer('year_of_study');
            $table->string('phone');
            $table->string('gender');
            $table->text('address');
            $table->string('parents_guardian_name');
            $table->string('parents_guardian_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
