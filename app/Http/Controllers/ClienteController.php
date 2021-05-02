<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
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
            $clientes = Clientes::all();
          
             //dd($clientes);
             return view('dashboard/dash-cliente', compact('clientes'));
            
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
        $cliente = new Clientes;
        //dd($request->all());

        $cliente->cpf = $request->input('cpf');
        $cliente->cnpj = $request->input('cnpj');
        $cliente->nome = $request->input('nome');
        $cliente->data_nascimento = $request->input('data_nascimento');
        $cliente->razao_social = $request->input('razao_social');
        $cliente->nome_fantasia = $request->input('nome_fantasia');
        $cliente->endereco = $request->input('endereco');
        
        $cliente->save();
        
        return redirect(route('clientes.index'));
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
        $clienteId = Clientes::find($id);
        return view('dashboard/dash-clienteEdit', compact('clienteId'));
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
        $cliente = Clientes::find($id);
        
        $cliente->cpf = $request->input('cpf');
        $cliente->cnpj = $request->input('cnpj');
        $cliente->nome = $request->input('nome');
        $cliente->data_nascimento = $request->input('data_nascimento');
        $cliente->razao_social = $request->input('razao_social');
        $cliente->nome_fantasia = $request->input('nome_fantasia');
        $cliente->endereco = $request->input('endereco');

        $cliente->save();
        return redirect('clientes.index');
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
        $cliente = Clientes::find($id);
        $cliente->delete();
        return redirect(route('clientes.index'));
    }
}
