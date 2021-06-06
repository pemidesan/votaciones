<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comunidad;
use App\Models\Vecino;

class Vivienda extends Model
{
    use HasFactory;
    protected $table = 'viviendas';
    protected $fillable = ['direccion','numero','piso','puerta','escalera','ratio','mail','comunidad_id'];
    protected $hidden = ['created_at','updated_at'];
    
    public function comunidad()
    {
        return $this->belongTo(Comunidad::class);
    }

    public function vecinos()
    {
        return $this ->belongToMany(Vecino::class); 
    }

}
