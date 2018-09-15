<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuento extends Model
{
    protected $fillable = [
      'titulo','idprofesor','nivel','estado','autor','descripcion',
    ];
}
