<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('student_id')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('image_path')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(Hash::make('password'));
            $table->foreignId('program_id')->nullable()->constrained('programs');
            $table->foreignId('usertype_id')->nullable()->constrained('user_types');
            $table->foreignId('research_id')->nullable()->constrained('research');
            $table->foreignId('confirmed_by_id')->nullable()->constrained('faculties');
            $table->softDeletes();

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
