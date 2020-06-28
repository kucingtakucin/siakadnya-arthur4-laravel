<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['cardnumber','firstname', 'lastname','name','jobtitle', 'year'];
}
