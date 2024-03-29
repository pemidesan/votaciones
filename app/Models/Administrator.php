<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comunidad;

class Administrator extends Model
{
    use HasFactory;
    protected $table = 'administrators';
    protected $fillable=[
        'nombre',
        'apellido1',
        'apellido2',
        'telefono',
        'mail'
    ]; 
    protected $hidden =['created_at','updated_at'];

    public function comunidades()
    {
        return $this->belongtoToMany(Comunidad::class);
    }
}
