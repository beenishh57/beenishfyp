<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('attendances', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('teacher_id');
        $table->unsignedBigInteger('student_id');

        $table->date('date');                // Date of attendance
        $table->enum('status', ['present', 'absent']);
        $table->timestamp('marked_at');      // DateTime of submission

        $table->timestamps();

        // Foreign keys
        $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');

        // Unique constraint to prevent duplicate attendance
        $table->unique(['teacher_id', 'student_id', 'date']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
