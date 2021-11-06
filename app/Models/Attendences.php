<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendences extends Model
{
    use HasFactory;
    public $table='attendence';

    protected $fillable = [
        'name',
        'status',

    ];
}
