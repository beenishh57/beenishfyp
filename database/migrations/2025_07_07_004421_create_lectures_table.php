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
    Schema::create('lectures', function (Blueprint $table) {
        $table->id();
        $table->string('subject');
        $table->string('teacher_name');
        $table->unsignedTinyInteger('class'); // e.g., 0 to 10
        $table->string('day_of_week'); // e.g., Monday, Tuesday
        $table->time('start_time');
        $table->time('end_time');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
