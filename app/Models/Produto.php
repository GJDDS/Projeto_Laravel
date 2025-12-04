<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // Adicione 'imagem' aos campos permitidos
    protected $fillable = ['nome', 'descricao', 'imagem'];
}