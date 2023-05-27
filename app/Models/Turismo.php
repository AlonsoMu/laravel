<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turismo extends Model
{
    protected $table="turismo";
    protected $primarykey="idturismo";
    protected $fillable=[
        'nombre_lugar','imagen','descripcion'
    ];

    public $timestamps=false;
}
