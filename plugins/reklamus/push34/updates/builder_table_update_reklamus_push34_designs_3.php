<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Designs3 extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_designs', function($table)
        {
            $table->text('window_img')->nullable();
            $table->text('pop_img')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_designs', function($table)
        {
            $table->dropColumn('window_img');
            $table->dropColumn('pop_img');
        });
    }
}
