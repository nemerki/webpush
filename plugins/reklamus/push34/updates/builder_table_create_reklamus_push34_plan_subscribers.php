<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateReklamusPush34PlanSubscribers extends Migration
{
    public function up()
    {
        Schema::create('reklamus_push34_plan_subscribers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('plan_id')->unsigned();
            $table->integer('subscriber_id');
            $table->primary(['plan_id','subscriber_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('reklamus_push34_plan_subscribers');
    }
}
