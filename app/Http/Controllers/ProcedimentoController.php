<?php

namespace App\Http\Controllers;

use App\Models\Procedimento;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProcedimentoController extends Controller
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
            $produtos = Produto::all();
            $produto_proced = DB::table('produtos_procedimentos as pp')
            ->join('produtos', 'produtos.id', '=', 'pp.produto_id')
            ->join('procedimentos', 'procedimentos.id', '=', 'pp.procedimento_id')
            ->select('*')
            ->get();
           // dd($produto_proced);
            $produtos = json_encode($produtos, true);
            return view('dashboard/dash-procedimento', compact('procedimentos', 'produtos','produto_proced'));
             
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
        $procedimentos = new Procedimento();
        $select = $request->input('select');
        $qtd = $request->input('qtd');
        //dd(count($array));
        $procedimentos->procedimento_nome = $request->input('procedimento_nome');
        $procedimentos->procedimento_valor = $request->input('procedimento_valor');
        $procedimentos->procedimento_descricao = $request->input('procedimento_descricao');
        $ldate = date('Y-m-d H:i:s');
        $procedimentos->save();
        //dd($procedimentos->id);
       // for($i=0 ; $i< count($array); $i++){
        foreach($select as $key=>$a) {
       // dump($select);
        //dump($qtd[$key]);
        //dd($a);
        DB::table('produtos_procedimentos')->insert([
            'produto_id' => $a,
            'procedimento_id' => $procedimentos->id,
            'quantidade' => $qtd[$key],
            'created_at' => $ldate,
            'updated_at' => $ldate
            ]);
        }
        // //$produtos->produto_quantidade = $request->input('produto_quantidade');
        
        return redirect(route('procedimentos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procedimento  $procedimento
     * @return \Illuminate\Http\Response
     */
    public function show(Procedimento $procedimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedimento  $procedimento
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()){
            $procedimentoId = Procedimento::find($id);
            $produtos = Produto::all();
            $produtosJson = json_encode($produtos, true);
            $prod_proced = DB::table('produtos_procedimentos as pp')->join('produtos', 'produtos.id', '=', 'pp.produto_id')->where('procedimento_id', $procedimentoId->id)->get();
           // dd($prod_proced);
            return view('dashboard/dash-procedimentoEdit', compact('produtos','produtosJson', 'procedimentoId','prod_proced'));
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @param  \App\Models\Procedimento  $procedimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $procedimentos = Procedimento::find($id);
        $select = $request->input('select');
        $qtd = $request->input('qtd');

        $procedimentos->procedimento_nome = $request->input('procedimento_nome');
        $procedimentos->procedimento_valor = $request->input('procedimento_valor');
        $procedimentos->procedimento_descricao = $request->input('procedimento_descricao');
        $ldate = date('Y-m-d H:i:s');
        $procedimentos->save();
//dd($request->all());
DB::table('produtos_procedimentos')->where('procedimento_id', '=', $id)->delete();
        foreach($select as $key=>$a) {


        DB::table('produtos_procedimentos')->insert([
            'produto_id' => $a,
            'procedimento_id' => $procedimentos->id,
            'quantidade' => $qtd[$key],
            'created_at' => $ldate,
            'updated_at' => $ldate
            ]);
        }

        
        return redirect('procedimentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedimento  $procedimento
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $procedimentos = Procedimento::find($id);
        DB::table('produtos_procedimentos')->where('procedimento_id', '=', $id)->delete();
        $procedimentos->delete();
        return redirect(route('procedimentos.index'));
    }
}
