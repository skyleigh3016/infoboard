<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    use HasFactory;
    protected $fillable = [
        
        'st_id',
        'name',
        'session',
        'department',
        'c_class',
       
        'dob',
        'gender',
        'phone',
        'email',
    ];
}
