<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Notifications4 extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_notifications', function($table)
        {
            $table->renameColumn('is_crone', 'is_cron');
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_notifications', function($table)
        {
            $table->renameColumn('is_cron', 'is_crone');
        });
    }
}
