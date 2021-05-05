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
                        <form role="form" action="{{ route('gera-procedimento.store') }}" method="POST" enctype="multipart/form-data" id="formnovoProcedimentos" autocomplete="on" style="display: none;">
                        @csrf
                        <div class="column">
                            <div class="col-md-12 col-12 justify-content-center">
                                <h4>Novo Procedimento </h4>
                                    <div class="col-md-12 d-flex my-3 justify-content-start">
                                        <div id="nome" class="col-md-4">
                                            <label for="pcd_nome" class="ml-2">Procedimento:</label>

                                                <select class="js-select-proced-name js-states form-control" id="pcd_select" name="procedimento" required>
                                                    <option value="" selected>Selecione...</option>
                                                    @foreach($procedimentos as $pcd)
                                                        <option value="{{$pcd->id}}" data-desc="{{$pcd->procedimento_descricao}}" data-value="{{$pcd->procedimento_valor}}">{{$pcd->procedimento_nome}}</option>
                                                    @endforeach
                                                </select>

                                        </div>

                                        <div id="chip" class="col-md-3">
                                            <label>Valor</label>
                                            <input type="number" required class="form-control" name="procedimento_valor" placeholder="Insira o valor do procedimento" min="0.00" max="100000.00" step="0.05" value="" id="pcd_value">
                                        </div>

                                    </div>
                                    <div class="col-md-12 mt-3 mb-2 d-flex">
                                        <div class="col-md-4" id="pcd_client">
                                            <label for="pcd_client" class="">Procedimento para o Cliente:</label>
                                            <select class="js-select-clients js-states form-control" name="cliente" required>
                                                <option value="">Selecione...</option>
                                                @foreach($clientes as $c)
                                                    <option value="{{$c->id}}">{{isset($c->nome) ? $c->nome : 'Empresa:'.$c->nome_fantasia}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3" id="pcd_animal">
                                            <label for="pcd_animal" class="">Procedimento para o Animal:</label>
                                            <select class="js-select-animal js-states form-control" name="animal" required>
                                                <option value="">Selecione...</option>
                                                @foreach($animais as $a)
                                                    <option value="{{$a->id}}">{{$a->animal_nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3 mb-2">
                                                <label for="pcd_descricao" class="ml-2">Descrição</label>
                                                <div class="col-md-4" id="pcd_descricao">
                                                    <textarea id="txt_desc" type="text" class="form-control" name="pcd_descricao" placeholder="Insira a descrição do procedimento" required></textarea>
                                                </div>
                                            </div>
                                    <!-- <div class="col-md-12 d-flex mt-3 mb-2 " >
                                            <div class="col-md-4 d-flex ">
                                            <button id="plus" type="button" class="form-control mr-3">Adicionar Produto</button>
                                            <button id="minus" type="button" class="form-control">Excluir Produto</button>
                                            </div>
                                    </div>
                                    <div class="row-md-12 d-flex" id="productsList-0">


                                    </div> -->


                                <div class="d-flex justify-content-start">
                                    <button type="submit" class="btn btn-success my-1 mr-2" name="addProcedimentos" value="adicionarProcedimentos">Adicionar</button>
                                    <button type="button" class="btn btn-danger my-1" id="cancelNew" name="cancelNew" value="cancelNew">Cancelar</button>

                                </div>
                            </div>
                        </form>
                        <!-- End Main Form -->
                    </div>

                    <div class="">
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

                                @foreach ($gera_procedimentos as $procedimentos)
                                    <tr>
                                        <td>{{$procedimentos->id}}</td>

                                        <td>{{isset($procedimentos->nome) ? $procedimentos->nome : $procedimentos->nome_fantasia}}</td>

                                        <td>{{$procedimentos->animal_nome.' | Chip:'.$procedimentos->chip}}</td>

                                        <td>{{($procedimentos->procedimento_nome)}} | R$ {{number_format($procedimentos->pcd_valor,2)}}</td>

                                        <td>{{$procedimentos->pcd_descricao}}</td>


                                        <td class="d-flex justify-content-end">

                                            <a href="{{ route('gera-procedimento.show', $procedimentos->id) }}" class="btn btn-info mx-1" >
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <form action="{{ route('gera-procedimento.destroy', $procedimentos->id)}}"
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
                            <script>document.write(new Date().getFullYear())</script> - Desenvolvido por <strong>
                                <a href="https://www.taticaweb.com.br/" target="_blank">Tática Web</a></strong>
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
            <!-- <script>
                let total = 0;
                let plus = document.getElementById("plus");
                let minus = document.getElementById("minus");

                let jsonProdutos= @json($produtos);
                var arrayJson = JSON.parse(jsonProdutos);
                console.log(arrayJson)

               // let row = document.querySelectorAll('.productsList')
                let row = document.getElementById('productsList-0')
                let cont = parseInt(row.getAttribute('id').replace(/^\D+/g, ''))



                plus.addEventListener('click', ()=>{
                    total += 1;
                    let select = document.createElement('select');
                    let input = document.createElement('input');


                    let clone = row.cloneNode(false);
                    clone.setAttribute('id', `productsList-${total}`)
                    clone.setAttribute('class', 'productsList col-md-8 d-flex')
                    //console.log(clone, cont)



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

                    row.after(clone);

                })
                minus.addEventListener('click', ()=>{
                    let divs = document.querySelectorAll('.productsList')
                    let lastDiv = divs.item(0)

                    lastDiv.remove();
                    //console.log(lastDiv)
                })

            </script> -->


            <script>
                // $('#obito_data').hide();
                // $('#obito_causa').hide();
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
                   // console.log(val)
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
                // $(".js-example-tags").select2({
                //     tags: true
                // });

                $("#novoProcedimentos").click(function(e){
                    e.preventDefault();
                    if($('#formEditProcedimentos').is(':visible')){
                        $('#formEditProcedimentos').hide(100);
                    }
                    $("#formnovoProcedimentos").show(200);
                    $("#novoProcedimentos").hide(100);
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
