<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vecino extends Model
{
    use HasFactory;
    protected $table = 'vecinos';

    protected $fillable=[
        'nombre',
        'apellido1',
        'apellido2',
        'telefono',
        'mail'
    ];

    protected $hidden =['created_at','updated_at'];
}
