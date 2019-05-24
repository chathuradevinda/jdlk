<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertiseQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expertise_questions', function (Blueprint $table) {
            $table->string('expertise_id');
            $table->string('question_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('expertise_questions',function($table){
            $table->dropColumn('expertise_id');
            $table->dropColumn('question_id');
        });
    }
}
