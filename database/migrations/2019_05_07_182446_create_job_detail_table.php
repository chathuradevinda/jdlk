<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_details', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('q1_ans')->nullable();
            $table->string('q2_ans')->nullable();
            $table->string('q3_ans')->nullable();
            $table->string('q4_ans')->nullable();
            $table->string('q5_ans')->nullable();
            $table->string('q6_ans')->nullable();
            $table->string('q7_ans')->nullable();
            $table->string('q8_ans')->nullable();
            $table->string('q9_ans')->nullable();
            $table->string('q10_ans')->nullable();
            
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('poastal_code');
            $table->string('contact_no');

            $table->timestamps();
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
