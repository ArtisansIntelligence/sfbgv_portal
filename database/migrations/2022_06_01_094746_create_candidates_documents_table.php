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
        Schema::create('candidates_documents', function (Blueprint $table) {
            $table->id('document_id');
            $table->unsignedBigInteger('candidate_id');
            $table->integer('doc_type');
            $table->string('doc_title', 50);
            $table->string('doc_file', 200);
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
        Schema::dropIfExists('candidates_documents');
    }
};
