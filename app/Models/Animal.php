<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
        'animal_nome',
        'chip',
        'tipo',
        'porte',
        'raca',
        'idade',
        'obito_data',
        'obito_causa',
    ];


    protected $guarded = ['_token'];

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
