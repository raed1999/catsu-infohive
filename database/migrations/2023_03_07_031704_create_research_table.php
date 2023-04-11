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
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('abstract');
            $table->year('year');
            $table->string('keyword');
            $table->foreignId('advisers_id')->constrained('faculties');
            $table->foreignId('faculty_in_charge_id')->constrained('faculties');
            $table->foreignId('confirmed_by_id')->constrained('faculties');
            $table->softDeletes();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research');
    }
};
