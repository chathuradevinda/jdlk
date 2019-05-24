<?php

namespace App;
use App\Expertise;
use App\Specialization;
use Illuminate\Database\Eloquent\Model;

class JobDetails extends Model
{
    protected $table = 'job_details';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'job_id','first_name','last_name', 'email', 'poastal_code', 'contact_no'
    ];


    public function expertise(){
        return $this->belongsTo('App\Expertise');
    }

    public function specialization(){
        return $this->belongsTo('App\Specialization');
    }
}
