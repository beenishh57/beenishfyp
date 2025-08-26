<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    Schema::create('attendances', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('student_id');
        $table->unsignedBigInteger('teacher_id');
        $table->date('date');
        $table->enum('status', ['present', 'absent']);
        $table->timestamps();

        $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
    });
}

};
