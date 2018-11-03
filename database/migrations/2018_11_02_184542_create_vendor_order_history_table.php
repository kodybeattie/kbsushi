<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorOrderHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_order_history', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('vendor_id');
            $table->integer('ing_id');
            $table->float('quantity', 6, 2);
            $table->integer('units');
            $table->float('cost' , 6, 2);
            $table->dateTime('date_ordered');
            $table->dateTime('date_recieved')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_order_history');
    }
}
