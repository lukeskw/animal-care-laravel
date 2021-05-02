<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
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
          if(Auth::check()){
              
              if($type==1){
                // dd($type);
            
                $produtos = Produto::all();
                
                $pdf = PDF::loadView('reports/relatorio', compact('produtos'));
                
                return $pdf->setPaper('a4', 'landscape')->stream('ProductReport.pdf');

            }
        }
      }
}
