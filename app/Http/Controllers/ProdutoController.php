<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
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
             $produtos = Produto::all();
             // $tipos = ['Felino', 'Canino','Equino','Caprino','Bovino','Ave','Reptil'];
             //dd($produtos);
             return view('dashboard/dash-produto', compact('produtos'));
              
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
        $produtos = new Produto();
        //dd($request->all());

        $produtos->produto_nome = $request->input('produto_nome');
        $produtos->produto_valor = $request->input('produto_valor');
        $produtos->produto_descricao = $request->input('produto_descricao');
        $produtos->produto_quantidade = $request->input('produto_quantidade');
        
        $produtos->save();
        
        return redirect(route('produtos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()){
        $produtoId = Produto::find($id);
        return view('dashboard/dash-produtoEdit', compact('produtoId'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produtos = Produto::find($id);
        //dd($produtos);
        $produtos->produto_nome = $request->input('produto_nome');
        $produtos->produto_valor = $request->input('produto_valor');
        $produtos->produto_descricao = $request->input('produto_descricao');
        $produtos->produto_quantidade = $request->input('produto_quantidade');
 
        $produtos->save();
        return redirect('produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produtos = Produto::find($id);
        $produtos->delete();
        return redirect(route('produtos.index'));
    }
}
