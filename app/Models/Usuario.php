<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = "usuarios";
    
    #Llave primaria unico e irrepetible
    protected $primaryKey = "id";
    
    #Array de los campos que se permiten llenar
    #Mapear, el modelo permite trabajar con la tabla
    protected $fillable = ["name","last_name","id_type",
    "id_card","phone","email","profession","role"];

}
