<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateReklamusPush34Plans extends Migration
{
    public function up()
    {
        Schema::create('reklamus_push34_plans', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('reklamus_push34_plans');
    }
}
