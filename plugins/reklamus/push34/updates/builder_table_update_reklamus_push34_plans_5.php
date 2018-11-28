<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Plans5 extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_plans', function($table)
        {
            $table->text('included')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_plans', function($table)
        {
            $table->dropColumn('included');
        });
    }
}
