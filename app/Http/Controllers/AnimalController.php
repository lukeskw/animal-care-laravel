<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Clientes;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
        /**
      * Create a new controller instance.
      *
      * @return void
      */
     public function __construct()
     {
         $this->middleware('auth');
     }
 
     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         if(Auth::check()){
            $animais = Animal::all();
            // $tipos = ['Felino', 'Canino','Equino','Caprino','Bovino','Ave','Reptil'];
            //dd($animal);
            return view('dashboard/dash-animal', compact('animais'));
             
         }
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $animais = new Animal();
         //dd($request->all());
 
         $animais->nome = $request->input('nome');
         $animais->chip = $request->input('chip');
         $animais->tipo = $request->input('tipo');
         $animais->porte = $request->input('porte');
         $animais->raca = $request->input('raca');
         $animais->idade = $request->input('idade');
         $animais->obito_data = $request->input('obito_data');
         $animais->obito_causa = $request->input('obito_causa');
         
         $animais->save();
         
         return redirect(route('animais.index'));
     }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\Clientes  $clientes
      * @return \Illuminate\Http\Response
      */
     public function show(Clientes $clientes)
     {
         //
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Clientes  $clientes
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit(Clientes $clientes, $id)
     {
         $animalId = Animal::find($id);
         return view('dashboard/dash-animalEdit', compact('animalId'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @param  \App\Models\Clientes  $clientes
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Clientes $clientes, $id)
     {
         $animais = Animal::find($id);
         
         $animais->nome = $request->input('nome');
         $animais->chip = $request->input('chip');
         $animais->tipo = $request->input('tipo');
         $animais->porte = $request->input('porte');
         $animais->raca = $request->input('raca');
         $animais->idade = $request->input('idade');
         $animais->obito_data = $request->input('obito_data');
         $animais->obito_causa = $request->input('obito_causa');
 
         $animais->save();
         return redirect('animais');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Clientes  $clientes
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy(Clientes $clientes, $id)
     {
         $animais = Animal::find($id);
         $animais->delete();
         return redirect(route('animais.index'));
     }
 }
