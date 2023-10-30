<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expositor extends Model
{
    use HasFactory;
    public function reuniones()
    {
        return $this->hasMany(reunions::class,'expositor_id');
    }
    protected $table = 'expositor';
    protected $fillable=['nombre','cargo','telefono'];

}
