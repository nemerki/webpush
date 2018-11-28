<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Actions extends Migration
{
    public function up()
    {
        Schema::rename('reklamus_push34_action', 'reklamus_push34_actions');
        Schema::table('reklamus_push34_actions', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::rename('reklamus_push34_actions', 'reklamus_push34_action');
        Schema::table('reklamus_push34_action', function($table)
        {
            $table->increments('id')->unsigned()->change();
        });
    }
}
