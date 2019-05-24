<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAnswerColumnsFromJobDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_details', function($table) {
           $table->dropColumn('q1_ans');
            $table->dropColumn('q2_ans');
            $table->dropColumn('q3_ans');
            $table->dropColumn('q4_ans');
            $table->dropColumn('q5_ans');
            $table->dropColumn('q6_ans');
            $table->dropColumn('q7_ans');
            $table->dropColumn('q8_ans');
            $table->dropColumn('q9_ans');
            $table->dropColumn('q10_ans');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
