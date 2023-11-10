<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class talleres extends Model
{
    use HasFactory;
    protected $fillable=['nombre','tipo_evento','fecha','lugar','documento'];
    
}
