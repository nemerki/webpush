<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Plans extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_plans', function($table)
        {
            $table->boolean('is_active')->default(1);
            $table->increments('id')->unsigned(false)->change();
            $table->string('name')->change();
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_plans', function($table)
        {
            $table->dropColumn('is_active');
            $table->increments('id')->unsigned()->change();
            $table->string('name', 191)->change();
        });
    }
}
