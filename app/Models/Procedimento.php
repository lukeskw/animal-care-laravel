<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    // use HasFactory;
     
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
        'procedimento_nome',
        'procedimento_valor',
        'procedimento_descricao',
        
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



     public function produtos()
     {
         return $this->hasMany(Produto::class);
     }
 }
