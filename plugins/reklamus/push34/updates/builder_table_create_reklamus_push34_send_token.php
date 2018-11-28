<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateReklamusPush34SendToken extends Migration
{
    public function up()
    {
        Schema::create('reklamus_push34_send_token', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('notification_id')->nullable()->unsigned();
            $table->text('tokens')->nullable();
            $table->boolean('is_send')->default(0);
            $table->integer('success')->nullable();
            $table->integer('failure')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('reklamus_push34_send_token');
    }
}
