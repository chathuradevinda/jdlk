<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Specilization;
use App\Question;
use App\Job;

class Expertise extends Model
{
    protected $table = 'expertises';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function specialization(){
        return $this->hasMany('App\Specialization');
    }

    public function question(){
        return $this->belongsTo('App\Question');
    }

    public function job(){
        return $this->belongsTo('App\Job');
    }

}
