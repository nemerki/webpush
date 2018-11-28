<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Apps extends Migration
{
    public function up()
    {
        Schema::rename('reklamus_push34_', 'reklamus_push34_apps');
        Schema::table('reklamus_push34_apps', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->string('app_key')->change();
            $table->string('app_pass')->change();
            $table->string('app_name')->change();
            $table->string('site_url')->change();
            $table->string('subdomain_name')->change();
        });
    }
    
    public function down()
    {
        Schema::rename('reklamus_push34_apps', 'reklamus_push34_');
        Schema::table('reklamus_push34_', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->string('app_key', 191)->change();
            $table->string('app_pass', 191)->change();
            $table->string('app_name', 191)->change();
            $table->string('site_url', 191)->change();
            $table->string('subdomain_name', 191)->change();
        });
    }
}
