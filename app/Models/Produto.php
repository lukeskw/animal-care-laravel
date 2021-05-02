<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // use HasFactory;
     
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
        'produto_nome',
        'produto_valor',
        'produto_descricao',
        'produto_quantidade'        
    ];

 
     
     /**
      * The attributes that should be cast to native types.
      *
      * @var array
      */
     protected $casts = [
         'updated_at' => 'datetime',
         'created_at' => 'datetime',
     ];
 }
