<?php

namespace App;
use App\Expertise;
use App\Specialization;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['title','expertise_id'];

    public function expertise(){
        return $this->belongsTo('App\Expertise');
    }

    public function specification(){
        return $this->belongsTo('App\Specialization');
    }
}
