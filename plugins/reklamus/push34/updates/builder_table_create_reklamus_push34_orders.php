<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateReklamusPush34Orders extends Migration
{
    public function up()
    {
        Schema::create('reklamus_push34_orders', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('plan_id')->nullable()->unsigned();
            $table->decimal('amount', 10, 2)->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('reklamus_push34_orders');
    }
}
