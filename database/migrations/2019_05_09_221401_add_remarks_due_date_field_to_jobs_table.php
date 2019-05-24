<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemarksDueDateFieldToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs',function($table){
            $table->string('remarks');
            $table->string('start_date');
            $table->integer('supervisor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs',function($table){
            $table->dropColumn('remarks');
            $table->dropColumn('start_date');
            $table->dropColumn('supervisor');
        });
    }
}
