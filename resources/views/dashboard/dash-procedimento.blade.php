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
                        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                        <div class="card-body">
                        @if(session()->get('error'))
                        <div class="alert alert-danger alert-dismissible show alert-estoque bg-danger" role="alert" id="alert-estoque">
                            <button type="button" class="close alert-close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong class="text-light">Alerta! {{session()->get('error')}}</strong>
                            </div>
                        @endif
                            <div class="form-group">
                                <form role="form" action="{{ route('procedimentos.store') }}" method="POST" enctype="multipart/form-data" id="formnovoProcedimentos" autocomplete="on" style="display: none;">
                                @csrf
                                <div class="column">
                                    <div class="col-md-12 col-12 justify-content-center">
                                        <h4>Novo Procedimento </h4>
                                            <div class="col-md-12 d-flex my-3">
                                                <div id="nome" class="col-md-4">
                                                    <label>Nome do Procedimentos</label>
                                                    <input type="text" required class="form-control" name="procedimento_nome" placeholder="Insira o nome do procedimento" value="">
                                                </div>
                                                <div id="chip" class="col-md-3">
                                                    <label>Valor</label>
                                                    <input type="number" required class="form-control" name="procedimento_valor" placeholder="Insira o valor do procedimento" min="0.00" max="100000.00" step="0.05" value="">
                                                </div>

                                            </div>
                                            <div class="col-md-12 mt-3 mb-2">
                                                <label for="procedimento_descricao" class="ml-2">Descrição do Procedimento</label>
                                                <div class="col-md-4" id="procedimento_descricao">
                                                    <textarea type="text" class="form-control" name="procedimento_descricao" placeholder="Insira uma breve descrição do procedimento" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 d-flex mt-3 mb-2 " >
                                                    <div class="col-md-4 d-flex ">
                                                    <button id="plus" type="button" class="form-control mr-3">Adicionar Produto</button>
                                                    <button id="minus" type="button" class="form-control">Excluir Produto</button>
                                                    </div>
                                            </div>
                                            <div class="row-md-12 d-flex" id="productsList-0">
                                                <!-- <div id="produtos" class="col-md-4 mx-3 my-2">
                                                        <label>Insira o Produto</label>
                                                        <select class="form-control js-example-tags" multiple="multiple" placeholder="Insira os produtos utilizados">
                                                        <option selected="selected">orange</option>
                                                        <option>white</option>
                                                        <option>purple</option>
                                                        </select>
                                                </div>
                                                <div id="quantidade" class="col-md-3 mx-3 my-2">
                                                        <label>Insira a Quantidade</label>
                                                        <input required type="number" class="form-control" name="procedimento_quantidade"
                                                        step="1" min="0" max="10000" placeholder="Insira a quantidade do Procedimentos" value="">
                                                </div>        -->

                                            </div>




                                        <div class="d-flex justify-content-start">
                                            <button type="submit" class="btn btn-success my-1 mr-2" name="addProcedimentos" value="adicionarProcedimentos">Adicionar</button>
                                            <button type="button" class="btn btn-danger my-1" id="cancelNew" name="cancelNew" value="cancelNew">Cancelar</button>

                                        </div>
                                    </div>
                            </form>

                            </div>

                            <div class="">
                                <button type="button" id="novoProcedimentos" class="btn btn-success my-1">Novo</button>
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
                                            @foreach ($procedimentos as $procedimentos)
                                                <tr>
                                                    <td>{{$procedimentos->id}}</td>

                                                    <td>{{$procedimentos->procedimento_nome}}</td>

                                                    <td>R$ {{number_format($procedimentos->procedimento_valor,2)}}</td>

                                                    <td>{{$procedimentos->procedimento_descricao}}</td>


                                                    <td class="d-flex justify-content-end">

                                                    <a href="{{ route('procedimentos.edit', $procedimentos->id) }}" class="btn btn-warning mx-1" ><i class="fas fa-pencil-alt"></i></a>

                                                        <form action="{{ route('procedimentos.destroy', $procedimentos->id)}}" method="POST"
                                                             onsubmit="return confirm('Deseja apagar este procedimento?');">

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
                                    <script>document.write(new Date().getFullYear())</script> - Desenvolvido por <strong><a href="https://porfiriodev.vercel.app/" target="_blank">Porfírio</a></strong>
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
                let total = 0;
                let plus = document.getElementById("plus");
                let minus = document.getElementById("minus");

                let jsonProdutos= @json($produtos);
                var arrayJson = JSON.parse(jsonProdutos);
                console.log(arrayJson)

               // let row = document.querySelectorAll('.productsList')
                let row = document.getElementById('productsList-0')
                let cont = parseInt(row.getAttribute('id').replace(/^\D+/g, ''))
                let arrDisabled = []


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
                    select.setAttribute('data-select', `select-${total}`)
                    select.append(selecione)
                    let optArray = []
                    arrayJson.map((produto)=>{

                        let option = document.createElement('option')
                        option.innerHTML = `${produto.produto_nome}`
                        option.setAttribute('id',`option-${produto.id}`)
                        option.setAttribute('data-opt',`select-${total}`)
                        option.setAttribute('value',`${produto.id}`)
                        option.setAttribute('class','product-option')
                        select.append(option);

                        optArray.push(option)
                        select.classList.add('form-control', 'col-md-3','my-1', 'mx-2' )

                    })
                    //console.log(optArray)
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

            </script>


            <script>
                x =$('#alert-estoque');
                $(document).ready(function() {
                    console.log(x)
                    setTimeout(()=>{ $('.alert-estoque').fadeOut('slow')}, 3000)
                });

                $(".js-example-tags").select2({
                    tags: true
                });

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


            </script>

            <script src="{{url('assets/dashboard/libs/sweetalert2/sweetalert2.min.js')}}"></script>

            <!-- Sweet alert init js-->
            <script src="{{url('assets/dashboard/js/pages/sweet-alerts.init.js')}}"></script>
@endsection
