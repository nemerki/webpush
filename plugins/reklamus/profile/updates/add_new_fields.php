<?php namespace Reklamus\Profile\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddNewFields extends Migration
{

    public function up()
    {
        Schema::table('users', function($table)
        {
           $table->string('phone')->nullable();
           $table->string('company_name')->nullable();
        });
    }

    public function down()
    {
       $table->dropDown([
           'phone',
           'company_name'
       ]);
    }

}
