<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title> @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Dashboard criada com base na UBOLD." name="description" />
        <meta content="TaticaWeb" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('assets/dashboard/images/favicon.png')}}">

        <!-- Plugins css -->
        <link href="{{url('assets/dashboard/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/dashboard/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
        
        <!-- App css -->
        <link href="{{url('assets/dashboard/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{url('assets/dashboard/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

        <link href="{{url('assets/dashboard/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
        <link href="{{url('assets/dashboard/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

        <!-- icons -->
        <link href="{{url('assets/dashboard/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "dark", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": false}'>

        <!-- Begin page -->
        <div id="wrapper">
<!-- <a class="dropdown-item" href="{{ route('logout') }}">
                                       <!-- onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> 
                                        {{ __('Logout') }}
                                    </a> -->
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">


            
                       <!-- <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-bell noti-icon"></i>
                                <span class="badge badge-danger rounded-circle noti-icon-badge">2</span>
                            </a>
                             <div class="dropdown-menu dropdown-menu-right dropdown-lg">
    
                                <!-- item
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="" class="text-dark">
                                                <small>Limpar</small>
                                            </a>
                                        </span>Notificações
                                    </h5>
                                </div>
    
                                <div class="noti-scroll" data-simplebar>
    
                                    <!-- item
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            <img src="{{url('assets/dashboard/images/users/user-1.jpg')}}" class="img-fluid rounded-circle')}}" alt="" /> </div>
                                        <p class="notify-details">Aniversário</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Hoje é aniversário de ALUNO 1</small>
                                        </p>
                                    </a>
                                    <!-- item
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>
    
                                </div>
    
                                <!-- All
                                <!-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    Ver Todos
                                    <i class="fe-arrow-right"></i>
                                </a>
     
                            </div> 
                        </li>-->
    
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <!-- <img src="{{url('assets/dashboard/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle"> -->
                                <span class="pro-user-name ml-1">
                                    {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Bem Vindo !</h6>
                                </div>
    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>Minha Conta</span>
                                </a>

                                <div class="dropdown-divider"></div>
    

                                <a class="dropdown-item notify-item" href="{{ route('logout') }}" 
                                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                       <i class="fe-log-out"></i>
                                        {{ __('Sair') }}
                                    </a> 
                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
    
                            </div>
                        </li>
    
                        <!-- <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                                <i class="fe-settings noti-icon"></i>
                            </a>
                        </li> -->
    
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="{{route('dashboard')}}" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{url('assets/dashboard/images/logo.png')}}" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="{{url('assets/dashboard/images/logo.png')}}" alt="" height="20">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>
    
                        <a href="{{route('dashboard')}}" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="{{url('assets/dashboard/images/logo.png')}}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{url('assets/dashboard/images/logo.png')}}" alt="" height="20">
                            </span>
                        </a>
                    </div>
    
                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>   
            
    
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                          
                            <li class="menu-title mt-2">Módulos</li>
                           
                            <li class="menu-title mt-2">Administrador</li>
                            <li class="menuitem-active">
                                <a href="{{route('dashboard')}}">
                                    <i data-feather="home"></i>
                                    <span> Início </span>
                                </a>
                            </li>


                            <li>
                                <a href="{{route('clientes.index')}}">
                                    <i class="icon-user"></i>
                                    <span> Cadastro de Clientes </span>
                                </a>
                            </li>

                          

                            <li>
                                <a href="{{route('animais.index')}}">
                                    <!-- <i class="fas fa-cat"></i> -->
                                    <i class="fas fa-paw"></i>
                                    <span> Cadastro de Animais </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{route('produtos.index')}}">
                                    <!-- <i class="icon-people"></i> -->
                                    <i class="mdi mdi-truck-outline"></i>
                                    <span> Cadastro de Produtos </span>
                                </a>
                            </li>

                            <!-- <li>
                                <a href="{{route('procedimentos.index')}}">
                                    
                                    <i class="mdi mdi-stethoscope"></i>
                                    <span> Procedimentos </span>
                                </a>
                            </li> -->
                            <li>
                                <a href="#sidebarProcedures" data-toggle="collapse">
                                    <i class="mdi mdi-stethoscope"></i>
                                    <span> Procedimentos </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarProcedures">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('procedimentos.index')}}">Cadastrar Novo Procedimento
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('gera-procedimento.index')}}">Gerar Procedimento
                                            </a>
                                        </li>
                                    </ul>    
                                </div>
                            </li>

                            <!-- <li>
                                <a href="{{route('dashboard')}}">
                                    <i data-feather="book-open"></i>
                                    <span> Relatórios </span>
                                </a>
                            </li> -->
                            <li>
                                <a href="#sidebarReports" data-toggle="collapse">
                                    <i data-feather="book-open"></i>
                                    <span> Relatórios </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarReports">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('dashboard')}}">Todos procedimentos por mês/cliente
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{route('generate-pdf',['type'=>1])}}">Relatório de Produtos
                                            </a>
                                        </li>
                                    </ul>    
                                </div>
                            </li>
                            <!-- <li>
                                <a href="{{route('dashboard')}}">
                                    <i data-feather="clipboard"></i>
                                    <span> Usuários </span>
                                </a>
                            </li> -->
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ========== Content  Start ========== -->
           
                    @yield('dash-body')

        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
    
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link py-2 active" data-toggle="tab" href="#settings-tab" role="tab">
                            <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
               

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{url('assets/dashboard/js/vendor.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{url('assets/dashboard/libs/flatpickr/flatpickr.min.js')}}"></script>
        <!-- <script src="assets/dashboard/libs/apexcharts/apexcharts.min.js"></script> -->

        <script src="{{url('assets/dashboard/libs/selectize/js/standalone/selectize.min.js')}}"></script>

        <!-- Dashboar 1 init js-->
       <script src="{{url('assets/dashboard/js/pages/dashboard-1.init.js')}}"></script>

        <!-- App js-->
        <script src="{{url('assets/dashboard/js/app.min.js')}}"></script>

        <script src="{{url('assets/dashboard/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('assets/dashboard/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{url('assets/dashboard/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('assets/dashboard/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{url('assets/dashboard/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('assets/dashboard/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{url('assets/dashboard/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{url('assets/dashboard/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{url('assets/dashboard/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{url('assets/dashboard/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{url('assets/dashboard/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>

        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="{{url('assets/dashboard/js/pages/datatables.init.js')}}"></script>
        <script>
            $('#sidebarReports').removeClass( "show" )
            
            //$('#sidebarProcedures').removeClass( "show" )
        </script>

        @if(Route::is('procedimentos.*') || Route::is('gera-procedimento.*'))
            <script>
                $('#sidebarProcedures').addClass( "show" )
            </script>
        @else
            <script>
                $('#sidebarProcedures').removeClass( "show" )
            </script>
        @endif
    </body>
</html>