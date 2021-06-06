<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reunion;

class Encuesta extends Model
{
    use HasFactory;
    protected $table = 'encuestas';

    protected $fillable=['pregunta','vectorOpciones','estado','reunion_id'];
    protected $hidden = ['vectorVotos','vectorViviendas','created_at','updated_at'];

    public function reuniones()
    {
        return $this->belongsTo(Reunion::class);
    }
}
