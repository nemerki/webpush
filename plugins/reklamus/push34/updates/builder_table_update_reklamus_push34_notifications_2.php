<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Notifications2 extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_notifications', function($table)
        {
            $table->boolean('is_send')->nullable()->unsigned(false)->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_notifications', function($table)
        {
            $table->smallInteger('is_send')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
