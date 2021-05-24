<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administrator;  
use App\Models\Comunidad;  

class administradoresComunidad extends Model
{
    use HasFactory;
    protected $table = 'administradoresComunidades';
    protected $fillable =['administrator_id','comunidad_id'];
    protected $hidden =['created_at','updated_at'];
}
