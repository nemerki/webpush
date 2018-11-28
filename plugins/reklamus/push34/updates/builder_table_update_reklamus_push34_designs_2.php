<?php namespace Reklamus\Push34\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateReklamusPush34Designs2 extends Migration
{
    public function up()
    {
        Schema::table('reklamus_push34_designs', function($table)
        {
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
            $table->smallInteger('status')->nullable(false)->default(1)->change();
        });
    }
    
    public function down()
    {
        Schema::table('reklamus_push34_designs', function($table)
        {
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
            $table->smallInteger('status')->nullable()->default(null)->change();
        });
    }
}
