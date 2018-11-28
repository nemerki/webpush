<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Notifications5 extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_notifications', function($table)
        {
            $table->boolean('is_cron')->nullable()->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_notifications', function($table)
        {
            $table->boolean('is_cron')->nullable(false)->default(1)->change();
        });
    }
}
