<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeraProcedimento extends Model
{
   // use HasFactory;

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
      protected $fillable = [
        'produto_id',
        'procedimento_id',
        'cliente_id',
        'animal_id',
        'pcd_valor',
        'pcd_descricao',

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



     public function animal()
     {
         return $this->belongsTo(Animal::class);
     }

     public function cliente()
     {
         return $this->belongsTo(Clientes::class);
     }

     public function procedimento()
     {
         return $this->belongsTo(Procedimento::class);
     }
}
