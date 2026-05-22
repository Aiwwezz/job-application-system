<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();

            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->text('address')->nullable();

            $table->foreignId('department_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('resume')->nullable();
            $table->string('transcript')->nullable();

            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
