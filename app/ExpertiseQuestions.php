<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Expertise;
use app\Question;

class ExpertiseQuestions extends Model
{
    protected $table = 'expertise_questions';
    protected $primaryKey = 'expertise_id';
    public $timestamps = true;


    public function expertise(){
        return $this->belongsTo('App\Expertise');
    }

    public function question(){
        return $this->belongsTo('App\Question');
    }
}
