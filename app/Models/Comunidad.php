<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    use HasFactory;
    protected $table='comunidades';
    protected $fillable=['direccion',
                         'alias',
                         'ciudad',
                         'provincia'
    ];
    protected $hidden = ['created_at','updated_at'];

    
}
