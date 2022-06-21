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
        Schema::create('candidates_employment', function (Blueprint $table) {
            $table->id('employment_id');
            $table->unsignedBigInteger('candidate_id');
            $table->string('employer_name', 50)->nullable(true);
            $table->string('empl_no', 50)->nullable(true);
            $table->date('doj')->nullable(true);
            $table->date('dol')->nullable(true);
            $table->string('grade', 200)->nullable(true);
            $table->string('designation', 200)->nullable();
            $table->string('reason_of_leaving', 200)->nullable();
            $table->string('manager_name', 50)->nullable(true);
            $table->string('manager_no', 15)->nullable(true);
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
        Schema::dropIfExists('candidates_employment');
    }
};
