<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateReklamusPush34Designs extends Migration
{
    public function up()
    {
        Schema::create('reklamus_push34_designs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('app_id')->nullable()->unsigned();
            $table->string('pop_position')->nullable();
            $table->string('pop_title')->nullable();
            $table->text('pop_text')->nullable();
            $table->string('pop_bg')->nullable();
            $table->string('pop_color')->nullable();
            $table->string('allow_btn')->nullable();
            $table->string('allow_btn_bg')->nullable();
            $table->string('allow_btn_color')->nullable();
            $table->string('dis_allow_btn')->nullable();
            $table->string('dis_allow_btn_color')->nullable();
            $table->string('dis_allow_btn_bg')->nullable();
            $table->text('window_text')->nullable();
            $table->integer('delay_sec')->nullable()->unsigned();
            $table->smallInteger('status')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('reklamus_push34_designs');
    }
}
