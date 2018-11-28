<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateReklamusPush34Notifications extends Migration
{
    public function up()
    {
        Schema::create('reklamus_push34_notifications', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('app_id')->nullable()->unsigned();
            $table->string('ntitle')->nullable();
            $table->text('ncontent')->nullable();
            $table->string('nurl')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaing')->nullable();
            $table->dateTime('push_date')->nullable();
            $table->dateTime('reg_date');
            $table->smallInteger('is_send')->nullable();
            $table->smallInteger('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('reklamus_push34_notifications');
    }
}
