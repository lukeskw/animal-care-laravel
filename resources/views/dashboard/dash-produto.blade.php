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

                        @foreach($json as $data)
                            <div class="alert alert-warning alert-dismissible show alert-estoque" role="alert">
                            <button type="button" class="close alert-close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Alerta!</strong> O produto {{$data['nome']}} está com o estoque baixo! {{$data['quantidade']}} itens restantes.
                            </div>
                        @endforeach

                       @if($errors->has('message1'))

                            <div class="alert alert-danger alert-dismissible show alert-estoque" role="alert">
                            <button type="button" class="close alert-close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Alerta! {{$errors->first('message1')}} </strong>
                            </div>
                        @endif

                            <div class="form-group">
                                <form role="form" action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data" id="formnovoProduto" autocomplete="on" style="display: none;">
                                @csrf
                                <div class="column">
                                    <div class="col-md-12 col-12 justify-content-center">
                                        <h4>Novo Produto</h4>
                                            <div class="col-md-12 d-flex my-3">
                                                <div id="nome" class="col-md-4">
                                                    <label>Nome do Produto</label>
                                                    <input type="text" required class="form-control" name="produto_nome" placeholder="Insira o nome do Produto" value="">
                                                </div>
                                                <div id="chip" class="col-md-3">
                                                    <label>Valor</label>
                                                    <input type="number" required class="form-control" name="produto_valor" placeholder="Insira o valor do produto" min="0.00" max="100000.00" step="0.05" value="">
                                                </div>
                                                <div id="quantidade" class="col-md-3">
                                                    <label>Insira a Quantidade em Estoque</label>
                                                    <input required type="number" class="form-control" name="produto_quantidade"
                                                    step="1" min="0" max="10000" placeholder="Insira a quantidade do Produto" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12 d-flex my-3">
                                                <div id="tipo" class="col-md-4">
                                                    <label>Descrição do Produto</label>
                                                    <textarea type="text" class="form-control" style="height:100px;" name="produto_descricao" placeholder="Insira a descrição do produto"></textarea>
                                                </div>


                                            </div>




                                        <div class="d-flex justify-content-start">
                                            <button type="submit" class="btn btn-success my-1 mr-2" name="addProduto" value="adicionarProduto">Adicionar</button>
                                            <button type="button" class="btn btn-danger my-1" id="cancelNew" name="cancelNew" value="cancelNew">Cancelar</button>

                                        </div>
                                    </div>
                            </form>

                            </div>

                            <div class="">
                                <button type="button" id="novoProduto" class="btn btn-success my-1">Novo</button>
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
                                            @foreach ($produtos as $produto)
                                                <tr>
                                                    <td>{{$produto->id}}</td>

                                                    <td>{{$produto->produto_nome}}</td>

                                                    <td>R$ {{number_format($produto->produto_valor,2)}}</td>

                                                    <td>{{$produto->produto_descricao}}</td>

                                                    @if($produto->produto_quantidade <=3)
                                                        <td class='bg-info'>{{$produto->produto_quantidade}}</td>
                                                    @else
                                                        <td>{{$produto->produto_quantidade}}</td>
                                                    @endif

                                                    <td class="d-flex justify-content-end">

                                                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning mx-1" ><i class="fas fa-pencil-alt"></i></a>

                                                        <form action="{{ route('produtos.destroy', $produto->id)}}" method="POST"
                                                             onsubmit="return confirm('Deseja apagar esta produto?');">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>

                                                    </form>

                                                    </td>
                                                </tr>
                                            @endforeach

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


            <script>
                // $('#obito_data').hide();
                // $('#obito_causa').hide();
                // $('#alert-close').click(function() {
                // $( "#alert-estoque" ).fadeOut("slow")
                // })
                    x =$('#alert-estoque');
                $(document).ready(function() {
                    console.log(x)
                    setTimeout(()=>{ $('.alert-estoque').fadeOut('slow')}, 3000)
                });


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

            // $(document).ready(function() {


            //     $("#flexRadioDefault2").on( "change", function() {

            //         if($('#flexRadioDefault2').is(':checked')){
            //             console.log('aki')
            //             $('#obito_data').show(100);
            //             $('#obito_data input').attr("required",true);
            //             var now = new Date();
            //             var today = new Date().toISOString().substr(0, 10);
            //             $('#obito_data input').val(today);
            //             $('#obito_causa').show(100);
            //             $('#obito_causa textarea').attr("required",true);
            //         }
            //     });
            //     $("#flexRadioDefault1").on( "change", function() {

            //         if($('#flexRadioDefault1').is(':checked')){
            //             console.log('aki')
            //             $('#obito_data').hide(100);
            //             $('#obito_data input').removeAttr("required").val('');
            //             $('#obito_causa').hide(100);
            //             $('#obito_causa textarea').removeAttr("required").val('');
            //         }
            //     });
            // })
            </script>

            <script src="{{url('assets/dashboard/libs/sweetalert2/sweetalert2.min.js')}}"></script>

            <!-- Sweet alert init js-->
            <script src="{{url('assets/dashboard/js/pages/sweet-alerts.init.js')}}"></script>
@endsection
