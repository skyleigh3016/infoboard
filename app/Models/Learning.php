<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Learning extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='learnings';

    protected $fillable=[
        'title',
        'description',
        'video',

    ];
}
