@extends('layouts.dashboard')
@section('title', 'Animais')
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
                                    <h4 class="page-title mt-4">Animais</h4>
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

                            <form role="form" action="{{ route('animais.update', $animalId->id) }}" method="POST" enctype="multipart/form-data" id="formEditAnimal" autocomplete="on" >
                                @method('PUT')
                                @csrf
                                <div class="column">
                                    <div class="col-md-12 col-12 justify-content-center">
                                        <h4>Novo Animal</h4>
                                            <div class="col-md-12 d-flex my-3">
                                                <div id="nome" class="col-md-4">
                                                    <label>Nome</label>
                                                    <input required type="text" class="form-control" name="nome" placeholder="Insira o nome do animal" value="{{isset($animalId->animal_nome) ? $animalId->animal_nome : '' }}">
                                                </div>
                                                <div id="chip" class="col-md-3">
                                                    <label>Nº do Chip</label>
                                                    <input required type="text" class="form-control" name="chip" placeholder="Insira o número do chip" value="{{isset($animalId->chip) ? $animalId->chip : '' }}">
                                                </div>
                                                <div id="tipo" class="col-md-3">
                                                    <label>Tipo de Animal</label>
                                                    <select required class='form-control select2' name='tipo'>
                                                        @if($animalId->animal_nome)
                                                        <option value="{{isset($animalId->tipo) ? $animalId->tipo : '' }}" selected>{{isset($animalId->tipo) ? $animalId->tipo : 'Selecione...' }}</option>

                                                        @endif
                                                        <option value="Felino" >Felino</option>
                                                        <option value="Canino" >Canino</option>
                                                        <option value="Equino" >Equino</option>
                                                        <option value="Caprino" >Caprino</option>
                                                        <option value="Bovino" >Bovino</option>
                                                        <option value="Ave" >Ave</option>
                                                        <option value="Reptil" >Réptil</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 d-flex my-3">
                                                <div id="raca" class="col-md-4">
                                                    <label>Raça</label>
                                                    <input required type="text" class="form-control" name="raca" placeholder="Insira a raça do animal" value="{{isset($animalId->raca) ? $animalId->raca : '' }}">
                                                </div>
                                                <div id="porte" class="col-md-3">
                                                    <label>Porte</label>
                                                    <input required type="text" class="form-control" name="porte" placeholder="Insira o porte do animal" value="{{isset($animalId->porte) ? $animalId->porte : '' }}">
                                                </div>
                                                <div id="porte" class="col-md-3">
                                                    <label>Idade Aproximada</label>
                                                    <input required type="text" class="form-control" name="idade" placeholder="Ex: 5 anos" value="{{isset($animalId->idade) ? $animalId->idade : '' }}">
                                                </div>

                                            </div>
                                            <div class="col-md-12 d-flex my-3 align-items-center" >
                                                <h5 class="ml-2 mt-2">Óbito?</h5><br>
                                                <div class="form-check mr-3 ml-2 mt-1">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Não
                                                    </label>
                                                </div>
                                                <div class="form-check mr-5 mt-1">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" {{isset($animalId->obito_data) ? 'checked' : '' }} >
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Sim
                                                    </label>
                                                </div>
                                                <div id="obito_data" class="col-md-3">
                                                    <label>Data do Óbito</label>
                                                    <input type="date" class="form-control" name="obito_data" placeholder="Insira a data de óbito" value="{{isset($animalId->obito_data) ? $animalId->obito_data : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-flex my-3">
                                                <div class="col-md-6" id="obito_causa">
                                                    <textarea style="width:470px;" type="text" class="form-control" name="obito_causa" placeholder="Insira o motivo do óbito">{{isset($animalId->obito_causa) ? $animalId->obito_causa : '' }}</textarea>
                                                </div>
                                            </div>


                                        <div class="d-flex justify-content-start">
                                            <button type="submit" class="btn btn-success my-1 mr-2" name="addAnimal" value="adicionarAnimal">Adicionar</button>
                                            <a class="btn btn-danger my-1" id="cancelEdit" name="cancelEdit" value="cancelEdit" style="color:white;" href="{{ route('animais.index')}}">Cancelar</a>

                                        </div>
                                    </div>
                            </form>


                            </div>



                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Nome</th>
                                                    <th>Nº Chip</th>
                                                    <th>Tipo</th>
                                                    <th>Porte</th>
                                                    <th>Raça</th>
                                                    <th>Idade</th>
                                                    <th>Óbito?</th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td>{{$animalId->id}}</td>

                                                    <td>{{$animalId->animal_nome}}</td>

                                                    <td>{{$animalId->chip}}</td>

                                                    <td>{{$animalId->tipo}}</td>

                                                    <td>{{$animalId->porte}}</td>

                                                    <td>{{$animalId->raca}}</td>

                                                    <td>{{$animalId->idade}}</td>

                                                    @if($animalId->obito_data)
                                                    <!-- <td>{{$animalId->obito_data}}</td> -->
                                                    <td><span style='font-size:20px; color:green'>&#10004;</span></td>
                                                    @else
                                                    <td><span style='font-size:20px; color:red'>&#10006;</span></td>
                                                    @endif
                                                    <td class="d-flex justify-content-end">

                                                    <a href="{{ route('animais.edit', $animalId->id) }}" class="btn btn-warning mx-1" ><i class="fas fa-pencil-alt"></i></a>

                                                        <form action="{{ route('animais.destroy', $animalId->id)}}" method="POST"
                                                             onsubmit="return confirm('Deseja apagar esta animal?');">

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
                $('#obito_data').hide();
                $('#obito_causa').hide();

                $("#novoAnimal").click(function(e){
                    e.preventDefault();
                    if($('#formEditAnimal').is(':visible')){
                        $('#formEditAnimal').hide(100);
                    }
                    $("#formnovoAnimal").show(200);
                    $("#novoAnimal").hide(100);
                });

                $("#cancelNew").click(function(e){
                        e.preventDefault();
                        $("#formnovoAnimal").hide(200);
                        $("#novoAnimal").show(100);

                });

                    $("#deleteAnimal").click(function(e){
                        e.preventDefault();
                        $("#formEditAnimal").hide();
                        $("#formnovoAnimal").hide();

                });

                $(document).ready(function() {

                if($('#flexRadioDefault2').is(':checked')){

                        $('#obito_data').show(100);
                        $('#obito_data input').attr("required",true);
                        //$('#obito_data input').val(today);
                        $('#obito_causa').show(100);
                        $('#obito_causa textarea').attr("required",true);
                    }

                $("#flexRadioDefault2").on( "change", function() {

                    if($('#flexRadioDefault2').is(':checked')){
                        //console.log('aki')
                        $('#obito_data').show(100);
                        $('#obito_data input').attr("required",true);
                        var now = new Date();
                        var today = new Date().toISOString().substr(0, 10);
                        $('#obito_data input').val(today);
                        $('#obito_causa').show(100);
                        $('#obito_causa textarea').attr("required",true);
                    }
                });
                $("#flexRadioDefault1").on( "change", function() {

                    if($('#flexRadioDefault1').is(':checked')){
                        console.log('aki')
                        $('#obito_data').hide(100);
                        $('#obito_data input').removeAttr("required").val('');
                        $('#obito_causa').hide(100);
                        $('#obito_causa textarea').removeAttr("required").val('');
                    }
                });
            })
            </script>

@endsection
