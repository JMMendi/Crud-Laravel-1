<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $fillable = ['titulo', 'contenido', 'categoria']; // <- Esto SIEMPRE hay que ponerlo. Todos los campos de la base de datos a rellenar que permitamos
}
