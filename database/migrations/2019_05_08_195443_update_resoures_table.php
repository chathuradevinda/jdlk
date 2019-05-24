<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateResouresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resources',function($table){
            $table->string('name');
            $table->string('model');
            $table->string('category');
            $table->string('unit_price');
            $table->string('amount');
            $table->string('trademark');
            $table->string('description');
            $table->string('expire_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('name');
        $table->dropColumn('model');
        $table->dropColumn('category');
        $table->dropColumn('unit_price');
        $table->dropColumn('amount');
        $table->dropColumn('trademark');
        $table->dropColumn('description');
        $table->dropColumn('expire_date');
    }
}
