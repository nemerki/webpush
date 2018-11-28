<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Registrants extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_registrants', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->increments('id')->unsigned(false)->change();
            $table->string('browser_type')->change();
            $table->string('sub_id')->change();
            $table->string('reg_ip')->change();
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_registrants', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
            $table->increments('id')->unsigned()->change();
            $table->string('browser_type', 191)->change();
            $table->string('sub_id', 191)->change();
            $table->string('reg_ip', 191)->change();
        });
    }
}
