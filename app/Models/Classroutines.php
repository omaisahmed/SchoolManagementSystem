<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroutines extends Model
{
    use HasFactory;

    protected $fillable=[
           'class',
           'section',
           'subject',
           'teacher',
           'classroom',
           'day',
           'starting_hour',
           'ending_hour',
           'starting_minute',
           'ending_minute',
    ];



}
