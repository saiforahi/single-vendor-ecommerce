<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->longText('description')->nullable();
            $table->longText('features')->nullable();
            $table->longText('compatible_products')->nullable();
            $table->nullableMorphs('extendable');
            $table->integer('price')->nullable();
            $table->float('weight',8,2)->default(0.0);
            $table->integer('stock')->default(0);
            $table->json('packaging_specs')->nullable();
            $table->enum('status',['active','inactive']);
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
        Schema::dropIfExists('products');
    }
}
