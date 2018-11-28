<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Notifications3 extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_notifications', function($table)
        {
            $table->boolean('is_crone')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_notifications', function($table)
        {
            $table->dropColumn('is_crone');
        });
    }
}
