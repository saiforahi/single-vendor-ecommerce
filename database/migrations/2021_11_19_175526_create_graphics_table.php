<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraphicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Graphics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            //common part ends here
            $table->json('general_specs')->nullable();
            $table->json('clock_specs')->nullable();
            $table->json('additional_specs')->nullable();
            $table->json('slug_name')->nullable();
    
            // $table->integer('price')->nullable();
            $table->string('type')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processors');
    }
}
