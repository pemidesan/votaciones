<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    use HasFactory;
    protected $table = 'reuniones';

    protected $fillable=['fecha','descripcion','administrator_id','comunidad_id'];
    protected $hidden = ['created_at','updated_at'];

}
