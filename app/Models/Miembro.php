<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Miembro extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','apellidos','ci','telefono','fecha_nac','direccion'];


    //funcion para recuperarn informacion de la tabla del que queremos recuperar las informacion
    public function user(){
        return $this->belongsTo(User::class);
    }

}
