<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('customer_address_title');
            $table->string('customer_email');
            $table->string('customer_address');
            $table->string('customer_state');
            $table->string('customer_city');
            $table->string('customer_postcode');
            $table->string('customer_phone');
            $table->integer('shipping_rate');
            $table->integer('total_quantity');
            $table->decimal('grand_total',12,4)->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
