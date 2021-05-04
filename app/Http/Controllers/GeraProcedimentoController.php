<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;

use App\Models\Procedimento;
use App\Models\GeraProcedimento;
use App\Models\Produto;
use App\Models\Animal;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeraProcedimentoController extends Controller
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
            $procedimentos = Procedimento::all();
            $gera_procedimentos = DB::table('gera_procedimentos as gp')
            ->join('procedimentos', 'procedimentos.id', '=', 'gp.procedimento_id')
            ->join('clientes', 'clientes.id', '=', 'gp.cliente_id')
            ->join('animals', 'animals.id', '=', 'gp.animal_id')
            ->select('gp.id', 'clientes.nome', 'clientes.nome_fantasia', 'animals.animal_nome', 'animals.chip', 'procedimentos.procedimento_nome', 'gp.pcd_valor', 'gp.pcd_descricao')
            ->get();//GeraProcedimento::all();
            $clientes = Clientes::all();
            $produtos = Produto::all();
            $animais = Animal::all();
            $produto_proced = DB::table('produtos_procedimentos as pp')
            ->join('produtos', 'produtos.id', '=', 'pp.produto_id')
            ->join('procedimentos', 'procedimentos.id', '=', 'pp.procedimento_id')
            ->select('*')
            ->get();
           // dd($gera_procedimentos);
           // $gera_procedimentos = json_encode($gera_procedimentos, true);
            $produtos = json_encode($produtos, true);
            return view('dashboard/dash-geraprocedimento', compact('procedimentos', 'animais', 'clientes', 'produtos','produto_proced','gera_procedimentos'));

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
        $gerapcd = new GeraProcedimento();

        $produto_proced = DB::table('produtos_procedimentos as pp')
            ->join('produtos', 'produtos.id', '=', 'pp.produto_id')
            ->join('procedimentos', 'procedimentos.id', '=', 'pp.procedimento_id')
            ->where('pp.procedimento_id', $request->input('procedimento'))
            ->select('*')
            ->get();
        foreach($produto_proced as $p){
        // dd($p);
            if($p->produto_quantidade < $p->quantidade){
                return redirect(route('gera-procedimento.index'))->with('error','Sem o produto '. $p->produto_nome.' suficiente no estoque!');
            }
            else{
                $calculo = $p->produto_quantidade - $p->quantidade;
                //dd($calculo);
                $produto_att = DB::table('produtos')->where('id', $p->produto_id)->update(['produto_quantidade' => $calculo]);
            }
        }
        $gerapcd->procedimento_id = $request->input('procedimento');
        $gerapcd->pcd_valor = $request->input('procedimento_valor');
        $gerapcd->pcd_descricao = $request->input('pcd_descricao');
        $gerapcd->cliente_id = $request->input('cliente');
        $gerapcd->animal_id = $request->input('animal');

        $gerapcd->save();

        return redirect(route('gera-procedimento.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $procedimentos = GeraProcedimento::find($id);
    //    $procedimentos = DB::table('gera_procedimentos')->select('*')->where('id', $id)
    //    ->get();
//dd($procedimentos);
        $procedimentos->delete();
        return redirect(route('gera-procedimento.index'));
    }
}
