<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateReklamusPush34IncludedPlans extends Migration
{
    public function up()
    {
        Schema::create('reklamus_push34_included_plans', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('plan_id')->unsigned();
            $table->integer('included_id')->unsigned();
            $table->primary(['plan_id','included_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('reklamus_push34_included_plans');
    }
}
