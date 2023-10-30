<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reunions extends Model
{
    use HasFactory;
    public function expositores()
    {
        return $this->belongsTo(expositor::class,'expositor_id');
    }
    //protected $guarded = ['id'];
    protected $fillable=['dia','hora_inicio','hora_final','expositor_id','tema'];
}
