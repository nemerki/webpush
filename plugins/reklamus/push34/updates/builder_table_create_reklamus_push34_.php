<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateReklamusPush34 extends Migration
{
    public function up()
    {
        Schema::create('reklamus_push34_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('app_key')->nullable();
            $table->string('app_pass')->nullable();
            $table->string('app_name')->nullable();
            $table->smallInteger('platform')->nullable();
            $table->smallInteger('sdk')->nullable();
            $table->string('site_url')->nullable();
            $table->boolean('full_ssl');
            $table->string('subdomain_name')->nullable();
            $table->smallInteger('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('reklamus_push34_');
    }
}
