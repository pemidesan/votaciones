<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vivienda;
use App\Models\Administrator;


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

    public function viviendas()
    {
        return $this -> hasMany(Vivienda::class);
    }

    public function administrators()
    {
        return $this -> belongToMany(Administrator::class);
    }
}
