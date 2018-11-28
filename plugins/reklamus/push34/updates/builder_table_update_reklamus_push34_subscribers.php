<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Subscribers extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_subscribers', function($table)
        {
            $table->boolean('is_active')->default(1);
            $table->integer('sort_order')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_subscribers', function($table)
        {
            $table->dropColumn('is_active');
            $table->dropColumn('sort_order');
        });
    }
}
