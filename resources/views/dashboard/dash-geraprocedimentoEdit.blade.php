@extends('layouts.dashboard')
@section('title', 'Gerar Procedimento')
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
                            <h4 class="page-title mt-4">Gerar Procedimentos</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <!-- end row -->
                <!--links and scripts-->
                <link href="{{url('assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
                <link href="{{url('assets/dashboard/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
                <link href="{{url('assets/dashboard/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
                <link href="{{url('assets/dashboard/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
                <script src="{{url('assets/dashboard/libs/pdfmake/build/pdfmake.min.js')}}"></script>
                <script src="{{url('assets/dashboard/libs/pdfmake/build/vfs_fonts.js')}}"></script>
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
                crossorigin="anonymous"></script>
                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                <div class="card-body">
                @if(session()->get('error'))
                        <div class="alert alert-danger alert-dismissible show alert-estoque bg-danger" role="alert">
                            <button type="button" class="close alert-close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong class="text-light">Alerta! {{session()->get('error')}}</strong>
                            </div>
                        @endif
                    <div class="form-group">
                        <!-- Main Form -->
                        <form role="form" action="{{ route('gera-procedimento.store') }}" method="POST" enctype="multipart/form-data" id="formnovoProcedimentos" autocomplete="on">
                        @csrf
                        <div class="column">
                            <div class="col-md-12 col-12 justify-content-center">
                                <h4>Visualizar Procedimento </h4>
                                    <div class="col-md-12 d-flex my-3 justify-content-start">
                                        <div id="nome" class="col-md-4">
                                            <label for="pcd_nome" class="ml-2">Procedimento:</label>
                                                <select class="js-select-proced-name js-states form-control" id="pcd_select" name="procedimento" disabled>
                                                    <option value="{{$procedimentoId->procedimento->id}}" data-desc="{{$procedimentoId->procedimento->procedimento_descricao}}" data-value="{{$procedimentoId->procedimento->procedimento_valor}}">{{$procedimentoId->procedimento->procedimento_nome}}</option>
                                                </select>

                                        </div>

                                        <div id="chip" class="col-md-3">
                                            <label>Valor</label>
                                            <input type="number" required class="form-control" name="procedimento_valor" disabled placeholder="Insira o valor do procedimento" min="0.00" max="100000.00" step="0.05" value="{{$procedimentoId->pcd_valor ?? ''}}" id="pcd_value">
                                        </div>

                                    </div>
                                    <div class="col-md-12 mt-3 mb-2 d-flex">
                                        <div class="col-md-4" id="pcd_client">
                                            <label for="pcd_client" class="">Procedimento para o Cliente:</label>
                                            <select class="js-select-clients js-states form-control" name="cliente" required disabled>
                                                <option value="{{$procedimentoId->cliente->id}}">{{isset($procedimentoId->cliente->nome) ? $procedimentoId->cliente->nome : 'Empresa:'.$procedimentoId->cliente->nome_fantasia}}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3" id="pcd_animal">
                                            <label for="pcd_animal" class="">Procedimento para o Animal:</label>
                                            <select class="js-select-animal js-states form-control" name="animal" required disabled>

                                                    <option value="{{$procedimentoId->animal->id}}">{{$procedimentoId->animal->animal_nome ?? ''}}</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3 mb-2">
                                                <label for="pcd_descricao" class="ml-2">Descrição</label>
                                                <div class="col-md-4" id="pcd_descricao">
                                                    <textarea id="txt_desc" type="text" class="form-control" name="pcd_descricao" disabled placeholder="Insira a descrição do procedimento" required disabled>{{$procedimentoId->pcd_descricao ?? ''}}</textarea>
                                                </div>
                                            </div>
                            </div>
                        </form>
                        <!-- End Main Form -->
                    </div>

                    <div class="mt-5">
                        <button type="button" id="novoProcedimentos" class="btn btn-success my-1">Novo</button>
                    </div>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                <tr>

                                    <th>id</th>
                                    <th>Cliente</th>
                                    <th>Animal</th>
                                    <th>Procedimento</th>
                                    <th>Descrição</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$procedimentoId->id}}</td>

                                    <td>{{isset($procedimentoId->cliente->nome) ? $procedimentoId->cliente->nome : $procedimentoId->cliente->nome_fantasia}}</td>

                                    <td>{{$procedimentoId->animal->animal_nome.' | Chip:'.$procedimentoId->animal->chip}}</td>

                                    <td>{{($procedimentoId->procedimento->procedimento_nome)}} | R$ {{number_format($procedimentoId->pcd_valor,2)}}</td>

                                    <td>{{$procedimentoId->pcd_descricao}}</td>


                                    <td class="d-flex justify-content-end">

                                        <a href="{{ route('gera-procedimento.show', $procedimentoId->id) }}" class="btn btn-info mx-1" >
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <form action="{{ route('gera-procedimento.destroy', $procedimentoId->id)}}"
                                                method="POST" onsubmit="return
                                                confirm('Deseja apagar este procedimento?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>

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
                            <script>document.write(new Date().getFullYear())</script> - Desenvolvido por <strong>
                                <a href="https://porfiriodev.vercel.app/" target="_blank">Porfírio</a></strong>
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
    <!--JavaScripts-->
            <script>

                x =$('#alert-estoque');
                $(document).ready(function() {
                    console.log(x)
                    setTimeout(()=>{ $('.alert-estoque').fadeOut('slow')}, 3000)
                });

                $("#pcd_select").change(function(){
                    let valor = $(this).find(':selected').data('value');
                    let desc = $(this).find(':selected').data('desc');
                    console.log(desc)
                    let val = parseFloat(valor).toFixed(2);
                    $("#pcd_value").val(val)
                    $("#txt_desc").val(desc)
                    })

                $(".js-select-clients").select2({
                    placeholder: "Selecione um cliente",
                    allowClear: true
                });
                $(".js-select-proced-name").select2({
                    placeholder: "Selecione um Procedimento",
                    allowClear: true
                });
                $(".js-select-animal").select2({
                    placeholder: "Selecione um Animal",
                    allowClear: true
                });


                $("#novoProcedimentos").click(function(e){
                    e.preventDefault();
                    window.location = "{{ url('/gera-procedimento') }}";
                });

                $("#cancelNew").click(function(e){
                        e.preventDefault();
                        $("#formnovoProcedimentos").hide(200);
                        $("#novoProcedimentos").show(100);

                });

                    $("#deleteProcedimentos").click(function(e){
                        e.preventDefault();
                        $("#formEditProcedimentos").hide();
                        $("#formnovoProcedimentos").hide();

                });

            </script>

            <script src="{{url('assets/dashboard/libs/sweetalert2/sweetalert2.min.js')}}"></script>

            <!-- Sweet alert init js-->
            <script src="{{url('assets/dashboard/js/pages/sweet-alerts.init.js')}}"></script>
@endsection
