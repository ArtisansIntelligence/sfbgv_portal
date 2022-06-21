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
        Schema::create('candidates_case', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id');
            $table->string('app_no', 50)->nullable();
            $table->date('initial_date')->nullable();
            $table->string('report_type', 50)->nullable();
            $table->date('interim_rep_upload_date')->nullable();
            $table->string('interim_rep_upload_color', 20)->nullable();
            $table->date('final_rep_upload_date')->nullable();
            $table->string('final_rep_color', 20)->nullable();
            $table->date('supp_rep_upload_date')->nullable();
            $table->string('supp_rep_color', 20)->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamp('created_dt', 0)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamp('updated_dt', 0)->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('candidates_case');
    }
};
