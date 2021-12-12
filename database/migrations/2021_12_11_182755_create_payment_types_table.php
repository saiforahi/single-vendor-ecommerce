<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PaymentType;
class CreatePaymentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_configured')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });

        PaymentType::create([
            'name'=>'Cash On Delivery',
            'is_configured'=>'1'
        ]);
        PaymentType::create([
            'name'=>'Bkash',
            'is_configured'=>'0'
        ]);
        PaymentType::create([
            'name'=>'Nagad',
            'is_configured'=>'0'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_types');
    }
}
