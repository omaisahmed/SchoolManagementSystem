<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected  $fillable = [
        'image',
        'name',
        'email',
        'password',
        'confirm_password',
        'class',
        'section',
        'phone',
        'gender',
        'dob',
        'address',
    ];
}
