<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     /**
      * Column
        * id
        * course_name
        * course_code
        * course_credit
        * course_description
      */
    public function up(): void
    {
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            //Start Column
            $table->string('course_name');
            $table->string('course_code');
            $table->integer('course_credit');
            $table->string('course_description')->nullable();
            //End Column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
