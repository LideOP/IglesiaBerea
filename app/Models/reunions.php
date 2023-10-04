<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reunions extends Model
{
    use HasFactory;
    //protected $guarded = ['id'];
    protected $fillable=['dia','hora_inicio','hora_final','expositor','tema'];
}
