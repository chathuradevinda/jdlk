<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDetailQuestions extends Model
{
    protected $table = 'job_detail_questions';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
