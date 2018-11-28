<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Notifications extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_notifications', function($table)
        {
            $table->integer('push_date')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_notifications', function($table)
        {
            $table->dateTime('push_date')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
