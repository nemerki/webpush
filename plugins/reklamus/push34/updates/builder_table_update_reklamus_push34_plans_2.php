<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Plans2 extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_plans', function($table)
        {
            $table->integer('sort_order')->nullable()->unsigned();
            $table->string('name')->change();
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_plans', function($table)
        {
            $table->dropColumn('sort_order');
            $table->string('name', 191)->change();
        });
    }
}
