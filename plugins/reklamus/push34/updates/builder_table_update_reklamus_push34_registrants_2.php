<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Registrants2 extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_registrants', function($table)
        {
            $table->boolean('is_active')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_registrants', function($table)
        {
            $table->dropColumn('is_active');
        });
    }
}
