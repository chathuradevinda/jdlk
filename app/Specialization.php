<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expertise;
use App\ExpertiseQuestions;
use App\Job;

class Specialization extends Model
{
    protected $table = 'specializations';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function expertise(){
        return $this->belongsTo('App\Specialization');
    }

    public function expertise_question(){
        return $this->belongsTo('App\ExpertiseQuestions');
    }

    public function job(){
        return $this->belongsTo('App\Job');
    }
    
    
}
