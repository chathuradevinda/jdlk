<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceArea extends Model
{
    protected $table = 'service_areas';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
