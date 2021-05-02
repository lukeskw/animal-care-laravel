<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Logout</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('assets/dashboard/images/favicon.ico')}}">

		<!-- App css -->
		<link href="{{url('assets/dashboard/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{url('assets/dashboard/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="{{url('assets/dashboard/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
		<link href="{{url('assets/dashboard/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

		<!-- icons -->
		<link href="{{url('assets/dashboard/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading authentication-bg authentication-bg-pattern" style="background: linear-gradient(90deg, #000 0%, #444 100%);">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <a href="{{route('home')}}" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{url('assets/dashboard/images/logo.png')}}" alt="" height="22">
                                            </span>
                                        </a>

                                    </div>
                                </div>

                                <div class="text-center">
                                    <div class="mt-4">
                                        <div class="logout-checkmark">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                                <circle class="path circle" fill="none" stroke="#4bd396" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                                                <polyline class="path check" fill="none" stroke="#4bd396" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                                            </svg>
                                        </div>
                                    </div>

                                    <h3>Nos vemos em breve !</h3>

                                    <p class="text-muted"> Você saiu do sistema com sucesso. </p>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-white-50">Voltar para a tela de 
                                   
                                    <a href="{{route('login')}}" class="text-white ml-1">
                                        <b>Log In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
        <script>document.write(new Date().getFullYear())</script> Desenvolvido por <a href="https://www.taticaweb.com.br" target="_blank" class="text-white-50">Tática Web</a> 
        </footer>

        <!-- Vendor js -->
        <script src="{{url('assets/dashboard/js/vendor.min.js')}}"></script>

        <script>
            setTimeout(function () {
                window.location.href= "{{route('home')}}" // the redirect goes here
                },5000); // 5 seconds
        </script>
        <!-- App js -->
        <script src="{{url('assets/dashboard/js/app.min.js')}}"></script>
        
    </body>
</html>