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
        Schema::create('candidates_address', function (Blueprint $table) {
            $table->id('address_id');
            $table->unsignedBigInteger('candidate_id');
            $table->string('address', 200);
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('pincode', 8);
            $table->string('permanent_address', 200)->nullable();
            $table->string('permanent_city', 50)->nullable();
            $table->string('permanent_state', 50)->nullable();
            $table->string('permanent_pincode', 8)->nullable();
            $table->timestamp('created_dt', 0)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamp('updated_dt', 0)->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            // $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates_address');
    }
};
