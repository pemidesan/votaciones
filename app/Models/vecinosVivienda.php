<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vivienda;  
use App\Models\Vecino;  

class vecinosVivienda extends Model
{
    use HasFactory;
    protected $table = 'vecinosViviendas';
    protected $fillable =['fecha_inicio','fecha_fin','vecino_id','vivienda_id'];
    protected $hidden =['created_at','updated_at'];

}
