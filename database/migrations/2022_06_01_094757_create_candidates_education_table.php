<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates_education', function (Blueprint $table) {
            $table->id('education_id');
            $table->unsignedBigInteger('candidate_id');
            $table->string('qual_name', 50)->nullable(true);
            $table->string('college', 50)->nullable(true);
            $table->string('address', 200)->nullable(true);
            $table->string('university', 200)->nullable(true);
            $table->string('year_of_passing', 200)->nullable(true);
            $table->string('roll_reg_enroll_pin_hall_no', 200)->nullable(true);
            $table->timestamp('created_dt', 0)->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamp('updated_dt', 0)->nullable();
            $table->unsignedBigInteger('updated_by');
            // $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates_education');
    }
};
