<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Designs extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_designs', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->increments('id')->unsigned(false)->change();
            $table->string('pop_position')->change();
            $table->string('pop_title')->change();
            $table->string('pop_bg')->change();
            $table->string('pop_color')->change();
            $table->string('allow_btn')->change();
            $table->string('allow_btn_bg')->change();
            $table->string('allow_btn_color')->change();
            $table->string('dis_allow_btn')->change();
            $table->string('dis_allow_btn_color')->change();
            $table->string('dis_allow_btn_bg')->change();
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_designs', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
            $table->increments('id')->unsigned()->change();
            $table->string('pop_position', 191)->change();
            $table->string('pop_title', 191)->change();
            $table->string('pop_bg', 191)->change();
            $table->string('pop_color', 191)->change();
            $table->string('allow_btn', 191)->change();
            $table->string('allow_btn_bg', 191)->change();
            $table->string('allow_btn_color', 191)->change();
            $table->string('dis_allow_btn', 191)->change();
            $table->string('dis_allow_btn_color', 191)->change();
            $table->string('dis_allow_btn_bg', 191)->change();
        });
    }
}
