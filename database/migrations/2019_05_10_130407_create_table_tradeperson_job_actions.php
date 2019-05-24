<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTradepersonJobActions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tradeperson_jobs_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id');
            $table->integer('tradeperson_id');
            $table->string('action');
            $table->string('remarks');    
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
        Schema::dropIfExists('tradeperson_jobs_actions');
    }
}
