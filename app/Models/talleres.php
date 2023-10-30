<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class talleres extends Model
{
    use HasFactory;
    protected $fillable=['titulo_taller','titulo_conferencia','fecha','lugar','documento'];
    
}
