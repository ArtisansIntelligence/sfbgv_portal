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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_ref_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('sf_ref_no', 100);
            $table->string('name', 50);
            $table->string('father_name', 50);
            $table->string('image', 150)->nullable();
            $table->string('gender', 10);
            $table->string('dob', 50);
            $table->string('doj', 50);
            $table->longText('token')->nullable();
            $table->string('mobile', 12);
            $table->string('email', 100);
            $table->string('zone', 100);
            $table->string('business_unit', 100)->nullable();
            $table->string('grade', 200)->nullable();
            $table->string('passport_no', 50)->nullable();
            $table->string('pancard_no', 50)->nullable();
            $table->string('aadharcard_no', 50)->nullable();
            $table->timestamp('created_dt', 0)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamp('updated_dt', 0)->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
