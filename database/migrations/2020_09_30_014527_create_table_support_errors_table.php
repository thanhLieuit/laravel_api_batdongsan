<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSupportErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_errors', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_support')->unsigned();
            $table->foreign('id_support')->references('id')->on('supports')->onDelete('cascade'); 
            $table->integer('id_error')->unsigned();
            $table->foreign('id_error')->references('id')->on('errors')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support_errors');
    }
}
