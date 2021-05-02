@extends('layouts.dashboard')
@section('title', 'Produtos')
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
                                    <h4 class="page-title mt-4">Produtos</h4>
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
                                                 
                            <form role="form" action="{{ route('produtos.update', $produtoId->id) }}" method="POST" enctype="multipart/form-data" id="formEditProduto" autocomplete="on" >
                                @method('PUT')
                                @csrf
                                <div class="column">
                                    <div class="col-md-12 col-12 justify-content-center">
                                        <h4>Editar Produto</h4>
                                            <div class="col-md-12 d-flex my-3">
                                                <div id="nome" class="col-md-4">
                                                    <label>Nome do Produto</label>
                                                    <input type="text" required class="form-control" name="produto_nome" placeholder="Insira o nome do Produto" value="{{isset($produtoId->produto_nome) ? $produtoId->produto_nome : '' }}">
                                                </div>
                                                <div id="chip" class="col-md-3">
                                                    <label>Valor</label>
                                                    <input type="number" required class="form-control" name="produto_valor" placeholder="Insira o valor do produto" min="0.00" max="100000.00" step="0.05" value="{{isset($produtoId->produto_valor) ? $produtoId->produto_valor : '' }}">
                                                </div>
                                                <div id="quantidade" class="col-md-4">
                                                    <label>Insira a Quantidade</label>
                                                    <input required type="number" class="form-control" name="produto_quantidade" 
                                                    step="1" min="0" max="10000" placeholder="Insira a quantidade do Produto" value="{{isset($produtoId->produto_quantidade) ? $produtoId->produto_quantidade : '' }}">
                                                </div>
                                                                                          
                                            </div>
                                            <div class="col-md-12 d-flex my-3">
                                            <div id="tipo" class="col-md-4">
                                                    <label>Descrição do Produto</label>
                                                    <textarea type="text" style="height:100px;" class="form-control" name="produto_descricao" placeholder="Insira a descrição do produto">{{isset($produtoId->produto_descricao) ? $produtoId->produto_descricao : '' }}</textarea>
                                                </div>                                                                                         
                                            </div>    
                                            
                                        <div class="d-flex justify-content-start">
                                            <button type="submit" class="btn btn-success my-1 mr-2" name="addProduto" value="adicionarProduto">Adicionar</button>
                                            <a class="btn btn-danger my-1" id="cancelEdit" name="cancelEdit" value="cancelEdit" style="color:white;" href="{{ route('produtos.index')}}">Cancelar</a>

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
                                                    <th>Quantidade em Estoque</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                        
                                                <tr>
                                                    <td>{{$produtoId->id}}</td>
                                        
                                                    <td>{{$produtoId->produto_nome}}</td>
                                            
                                                    <td>{{$produtoId->produto_valor}}</td>
                                            
                                                    <td>{{$produtoId->produto_descricao}}</td>
                                            
                                                    <td>{{$produtoId->produto_quantidade}}</td>
                                                    <td class="d-flex justify-content-end">
                                                   
                                                    <a href="{{ route('produtos.edit', $produtoId->id) }}" class="btn btn-warning mx-1" ><i class="fas fa-pencil-alt"></i></a>

                                                        <form action="{{ route('produtos.destroy', $produtoId->id)}}" method="POST"
                                                             onsubmit="return confirm('Deseja apagar esta Produto?');">
                                                            
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
