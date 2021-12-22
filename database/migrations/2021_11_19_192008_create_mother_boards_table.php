<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mother_boards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            //common part ends here
            //$table->json('product_specs')->nullable();
            $table->json('cpu_specs')->nullable();
            $table->json('back_panel_specs')->nullable();
            $table->json('storage_specs')->nullable();
            $table->json('memory_specs')->nullable();
            $table->string('short_name')->nullable();
            $table->json('internal_specs')->nullable();
            $table->json('front_panel_specs')->nullable();
            $table->json('audio_specs')->nullable();
            $table->json('wireless_specs')->nullable();
            $table->json('software_specs')->nullable();
            $table->json('physical_specs')->nullable();
            $table->json('packaging_specs')->nullable();
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
        Schema::dropIfExists('mother_boards');
    }
}
