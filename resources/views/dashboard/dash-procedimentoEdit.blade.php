@extends('layouts.dashboard')
@section('title', 'Procedimentos')
@section('dash-body')
           <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
                    
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                    <h4 class="page-title mt-4">Procedimentos</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                       
                        <!-- end row -->
                        <link href="{{url('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
                        <link href="{{url('assets/dashboard/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
                        <link href="{{url('assets/dashboard/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
                        <link href="{{url('assets/dashboard/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
                        <script src="{{url('assets/dashboard/libs/pdfmake/build/pdfmake.min.js')}}"></script>
                        <script src="{{url('assets/dashboard/libs/pdfmake/build/vfs_fonts.js')}}"></script>
                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
                        crossorigin="anonymous"></script>
                        
                        <div class="card-body">
                        <div class="form-group">
                                                 
                            <form role="form" action="{{ route('procedimentos.update', $procedimentoId->id) }}" method="POST" enctype="multipart/form-data" id="formEditProduto" autocomplete="on" >
                                @method('PUT')
                                @csrf
                                <div class="column">
                                    <div class="col-md-12 col-12 justify-content-center">
                                        <h4>Editar Procedimento</h4>
                                            <!-- <div class="col-md-12 d-flex my-3">
                                                <div id="nome" class="col-md-4">
                                                    <label>Nome do Produto</label>
                                                    <input type="text" required class="form-control" name="produto_nome" placeholder="Insira o nome do Produto" value="{{isset($procedimentoId->produto_nome) ? $procedimentoId->produto_nome : '' }}">
                                                </div>
                                                <div id="chip" class="col-md-3">
                                                    <label>Valor</label>
                                                    <input type="number" required class="form-control" name="produto_valor" placeholder="Insira o valor do produto" min="0.00" max="100000.00" step="0.05" value="{{isset($procedimentoId->produto_valor) ? $procedimentoId->produto_valor : '' }}">
                                                </div>
                                                <div id="quantidade" class="col-md-4">
                                                    <label>Insira a Quantidade</label>
                                                    <input required type="number" class="form-control" name="produto_quantidade" 
                                                    step="1" min="0" max="10000" placeholder="Insira a quantidade do Produto" value="{{isset($procedimentoId->produto_quantidade) ? $procedimentoId->produto_quantidade : '' }}">
                                                </div>
                                                                                          
                                            </div>
                                            <div class="col-md-12 d-flex my-3">
                                            <div id="tipo" class="col-md-4">
                                                    <label>Descrição do Produto</label>
                                                    <textarea type="text" style="height:100px;" class="form-control" name="produto_descricao" placeholder="Insira a descrição do produto">{{isset($procedimentoId->produto_descricao) ? $procedimentoId->produto_descricao : '' }}</textarea>
                                                </div>                                                                                         
                                            </div>     -->
                                            <div class="col-md-12 d-flex my-3">
                                                <div id="nome" class="col-md-4">
                                                    <label>Nome do Procedimentos</label>
                                                    <input type="text" required class="form-control" name="procedimento_nome" placeholder="Insira o nome do procedimento" value="{{isset($procedimentoId->procedimento_nome) ? $procedimentoId->procedimento_nome : '' }}">
                                                </div>
                                                <div id="chip" class="col-md-3">
                                                    <label>Valor</label>
                                                    <input type="number" required class="form-control" name="procedimento_valor" placeholder="Insira o valor do procedimento" min="0.00" max="100000.00" step="0.05" value="{{isset($procedimentoId->procedimento_valor) ? number_format($procedimentoId->procedimento_valor,2) : '' }}">
                                                </div>
                                                                                   
                                            </div>
                                            <div class="col-md-12 mt-3 mb-2">
                                                <label for="procedimento_descricao" class="ml-2">Descrição do Procedimento</label>
                                                <div class="col-md-4" id="procedimento_descricao">
                                                    <textarea type="text" class="form-control" name="procedimento_descricao" placeholder="Insira uma breve descrição do procedimento">{{isset($procedimentoId->procedimento_descricao) ? $procedimentoId->procedimento_descricao : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 d-flex mt-3 mb-2 " >
                                                    <div class="col-md-4 d-flex ">
                                                    <button id="plus" type="button" class="form-control mr-3">Adicionar Produto</button>
                                                    <button id="minus" type="button" class="form-control">Excluir Produto</button>
                                                    </div>   
                                            </div>
                                            <div class="col-md-12 d-flex productsList" id="productsList-0">
                                         
                                                                                           
                                            </div>    
                                            @foreach($prod_proced as $key=>$p)
                                            <div class="row-md-12 d-flex productsList" id="productsList-{{$key+1}}">
                                                <select required="true" name="select[]" class="form-control col-md-3 my-1 mx-2">
                                                    <option value="">Selecione...</option>
                                                    @if($p->produto_id)
                                                        <option id="option-{{$p->produto_id}}" selected value="{{$p->produto_id}}">{{$p->produto_nome}}</option>
                                                    @endif
                                                    @foreach($produtos as $k_prod=> $produto)
                                                        <option id="option-{{$k_prod}}" value="{{$produto->id}}">{{$produto->produto_nome}}</option>
                                                    @endforeach
                                                </select> 
                                                <input id="input-{{$key}}" name="qtd[]" required="true" type="number" step="1" min="0" max="1000" placeholder="Insira a quantidade do produto selecionado" class="form-control col-md-4 mx-2 my-1" value="{{isset($p->quantidade) ? $p->quantidade : '' }}">                                        
                                            </div>    
                                            @endforeach
                                        <div class="d-flex justify-content-start">
                                            <button type="submit" class="btn btn-success my-1 mr-2" name="addProduto" value="adicionarProduto">Adicionar</button>
                                            <a class="btn btn-danger my-1" id="cancelEdit" name="cancelEdit" value="cancelEdit" style="color:white;" href="{{ route('procedimentos.index')}}">Cancelar</a>

                                        </div>
                                    </div>
                            </form>
                            

                            </div>   
    
                            
                            
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Nome</th>
                                                    <th>Valor</th>
                                                    <th>Descrição</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                        
                                                <tr>
                                                    <td>{{$procedimentoId->id}}</td>
                                        
                                                    <td>{{$procedimentoId->procedimento_nome}}</td>
                                            
                                                    <td>R$ {{number_format($procedimentoId->procedimento_valor,2)}}</td>
                                            
                                                    <td>{{$procedimentoId->procedimento_descricao}}</td>
                                            
                                                    
                                                    <td class="d-flex justify-content-end">
                                                   
                                                    <a href="{{ route('procedimentos.edit', $procedimentoId->id) }}" class="btn btn-warning mx-1" ><i class="fas fa-pencil-alt"></i></a>

                                                        <form action="{{ route('procedimentos.destroy', $procedimentoId->id)}}" method="POST"
                                                             onsubmit="return confirm('Deseja apagar esta Procedimento?');">
                                                            
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                                            
                                                    </form>
                                              
                                                    </td>
                                                </tr>
                                            
                                            </tbody>
                                        </table>
                                        
                                    </div> <!-- end card body-->
                        
                    </div><!--  container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-md-right justify-content-end d-none d-sm-block">
                                    <script>document.write(new Date().getFullYear())</script> - Desenvolvido por <strong><a href="https://www.taticaweb.com.br/" target="_blank">Tática Web</a></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
            <!-- <script>
                $(document).ready(function() {
                $('#sort').DataTable( {
                    columnDefs: [
                    //"order": false,
                    { orderable: false, targets: 0 }
                    ].
                } );
            } );
            </script> -->

            <script>
               // let total = 0;
                let plus = document.getElementById("plus");
                let minus = document.getElementById("minus");

                let jsonProdutos= @json($produtosJson);
                var arrayJson = JSON.parse(jsonProdutos);
                console.log(arrayJson)
                
                let rowF = document.getElementById('productsList-0')
                let row = document.getElementsByClassName('productsList')
                console.log(row.length)
                let cont = parseInt(row[(row.length)-1].getAttribute('id').replace(/^\D+/g, ''))
                let total = cont
                console.log(total, cont)

                
                plus.addEventListener('click', ()=>{
                    total += 1;
                    let select = document.createElement('select');
                    let input = document.createElement('input');

                      
                    let clone = rowF.cloneNode(false);
                    clone.setAttribute('id', `productsList-${total}`)
                    clone.setAttribute('class', 'productsList row-md-12 d-flex')
                    console.log(clone, cont)
                    

    
                    selecione = document.createElement('option')
                    selecione.innerHTML = 'Selecione...'
                    selecione.setAttribute('value', '')
                    selecione.setAttribute('selected', true)
                    select.setAttribute('required', true)
                    //select.setAttribute('name', `select-${total}`)
                    select.setAttribute('name', 'select[]')
                    select.append(selecione)
                    arrayJson.map((produto)=>{

                        let option = document.createElement('option')
                        option.innerHTML = `${produto.produto_nome}`
                        option.setAttribute('id',`option-${produto.id}`)
                        option.setAttribute('value',`${produto.id}`)
                        select.append(option);    
                        select.classList.add('form-control', 'col-md-3','my-1', 'mx-2' )

                    })
                    input.setAttribute('id',`input-${total}`)
                    //input.setAttribute('name',`qtd[-${total}]`)
                    input.setAttribute('name','qtd[]')
                    input.setAttribute('required',true)
                    input.setAttribute('type', 'number')
                    input.setAttribute('step', '1')
                    input.setAttribute('min', '0')
                    input.setAttribute('max', '1000')
                    
                    input.setAttribute('placeholder','Insira a quantidade do produto selecionado')
                    input.classList.add('form-control', 'col-md-4', 'mx-2', 'my-1')

                    clone.appendChild(select)
                    clone.appendChild(input)
                    
                    rowF.after(clone);
                  
                })
                minus.addEventListener('click', ()=>{
                    let divs = document.querySelectorAll('.productsList')
                    let lastDiv = divs.item(1)

                    console.log(lastDiv)
                    lastDiv.remove();
                })

            </script>

            <script>
               

                $("#novoProduto").click(function(e){
                    e.preventDefault();
                    if($('#formEditProduto').is(':visible')){
                        $('#formEditProduto').hide(100);
                    }
                    $("#formnovoProduto").show(200);
                    $("#novoProduto").hide(100);
                });

                $("#cancelNew").click(function(e){
                        e.preventDefault();
                        $("#formnovoProduto").hide(200);
                        $("#novoProduto").show(100);
                        
                });      
                
                    $("#deleteProduto").click(function(e){
                        e.preventDefault();
                        $("#formEditProduto").hide();
                        $("#formnovoProduto").hide();
                        
                });   

                
            </script>

@endsection
