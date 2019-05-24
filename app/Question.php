<?php

namespace App;
use App\Expertise;
use App\ExpertiseQuestion;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    public $timestamps = true;


    public function expertise(){
        return $this->belongsTo('App\Expertise');
    }

    public function expertise_question(){
        return $this->belongsTo('App\ExpertiseQuestion');
    }

}
