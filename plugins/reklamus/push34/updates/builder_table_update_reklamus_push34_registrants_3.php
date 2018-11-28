<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Registrants3 extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_registrants', function($table)
        {
            $table->string('device')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_registrants', function($table)
        {
            $table->dropColumn('device');
        });
    }
}
