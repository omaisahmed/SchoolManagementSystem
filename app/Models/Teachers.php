<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'email',
        'password',
        'confirm_password',
        'designation',
        'department',
        'phone',
        'gender',
        'dob',
        'address',
    

    ];

    // public function user()
    // {
    //     return $this->belongsTo(Users::class);
    // }
}
