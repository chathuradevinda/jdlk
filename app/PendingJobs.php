<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingJobs extends Model
{
    protected $table = 'tradeperson_jobs_actions';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
