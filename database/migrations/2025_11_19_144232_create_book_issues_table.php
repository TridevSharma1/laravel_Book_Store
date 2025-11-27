<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('book_issues', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('student_id');

            // Model fields
            $table->date('issue_date');
            $table->date('return_date')->nullable();
            $table->string('status')->default('issued');

            $table->timestamps();
            $table->softDeletes();

            // FK constraints
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_issues');
    }
};
