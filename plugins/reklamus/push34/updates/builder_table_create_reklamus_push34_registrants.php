<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateReklamusPush34Registrants extends Migration
{
    public function up()
    {
        Schema::create('reklamus_push34_registrants', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('app_id')->nullable()->unsigned();
            $table->string('browser_type')->nullable();
            $table->string('sub_id')->nullable();
            $table->string('reg_ip')->nullable();
            $table->smallInteger('status')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('reklamus_push34_registrants');
    }
}
