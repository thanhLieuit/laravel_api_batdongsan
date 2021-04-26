<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name_product')->nullable();
            $table->string('image')->nullable();
            $table->string('content')->nullable();
            $table->string('summary')->nullable();
            $table->integer('price')->nullable();
            $table->integer('dientich')->nullable();
            $table->integer('like')->nullable();
            $table->string('action')->nullable();
            $table->integer('id_tp')->nullable();
            $table->integer('id_h')->nullable();
            $table->string('status')->nullable();
            $table->integer('id_type')->unsigned();
            $table->integer('id_user')->unsigned()->nullable();
            $table->integer('id_admin')->unsigned()->nullable();
            $table->foreign('id_type')->references('id')->on('type_products')->onDelete('cascade');  
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_admin')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
