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
        Schema::create('user_client_mappings', function (Blueprint $table) {
            $table->id('mapping_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('client_id');
            $table->boolean('is_active')->default(true);
            $table->timestamp('created_dt', 0)->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamp('updated_dt', 0)->nullable();
            $table->unsignedBigInteger('updated_by');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_client_mappings');
    }
};
