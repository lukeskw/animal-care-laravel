<?php

namespace App\Http\Controllers;

use App\Models\GeraProcedimento;
use Illuminate\Http\Request;
use App\Models\Produto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class PdfController extends Controller
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
     * Show the form for generating the specified page.
     *
     * @param  \App\Models\Produto  $produto
     * @param int $type
     * @return \Illuminate\Http\Response
     */
      public function generate($type){

        date_default_timezone_set('America/Sao_Paulo');
        setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');
        setlocale(LC_TIME, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');

          if(Auth::check()){

              if($type==1){
                // dd($type);

                $produtos = Produto::all();

                $pdf = PDF::loadView('reports/relatorioProduto', compact('produtos'));

                return $pdf->setPaper('a4', 'landscape')->stream('ProductReport.pdf');

            }
            if($type==2){
                Carbon::setLocale('pt');
                //$mytime = Carbon::now();
               // dd($mytime->format('F'));
                //$produtos = Produto::all();

              //  $gera_procedimentos = new GeraProcedimento();
                $gera_procedimentos = DB::table('gera_procedimentos as gp')->join('procedimentos', 'procedimentos.id', '=', 'gp.procedimento_id')
                ->join('clientes', 'clientes.id', '=', 'gp.cliente_id')
                ->join('animals', 'animals.id', '=', 'gp.animal_id')
                ->select('gp.id', 'clientes.nome', 'clientes.id as id_cli', 'clientes.nome_fantasia', 'animals.animal_nome', 'animals.chip', 'procedimentos.procedimento_nome', 'gp.pcd_valor', 'gp.pcd_descricao')->whereDate('gp.created_at', '=', Carbon::today()->toDateString())->orderBy('clientes.id')->get();
                //$gera_procedimentos->whereDate('created_at', '=', Carbon::today()->toDateString());
                $mes =  Carbon::today()->getTranslatedMonthName();
                //dd($mes);

                $pcd_sum = DB::table('gera_procedimentos as gp')->join('procedimentos', 'procedimentos.id', '=', 'gp.procedimento_id')->join('clientes', 'clientes.id', '=', 'gp.cliente_id')->join('animals', 'animals.id', '=', 'gp.animal_id')
                ->select(DB::raw('sum(  gp.pcd_valor ) as valor ,clientes.id, clientes.nome, clientes.nome_fantasia, animals.animal_nome'))->groupBy('clientes.nome','clientes.nome_fantasia', 'clientes.id','animals.animal_nome')->get();


               // dd($pcd_sum);

                $pdf = PDF::loadView('reports/relatorioPcdMesClient', compact('gera_procedimentos','mes', 'pcd_sum'));

                return $pdf->setPaper('a4', 'landscape')->stream('ProcedPerMonthReport.pdf');

            }
        }
      }
}
