<?php namespace Custom\Slawek\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class ExtendUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('company');
            $table->string('phone');
            $table->string('city');
        });
    }

    public function down()
    {
        Schema::dropColumn('company');
        Schema::dropColumn('phone');
        Schema::dropColumn('city');
    }
}
