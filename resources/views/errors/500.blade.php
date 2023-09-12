<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Error Page | 500 | Internal Server Error </title>
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

    <body class="loading authentication-bg authentication-bg-pattern" style="background: linear-gradient(90deg, #6c757d 0%, #444 100%);">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <!-- <div class="auth-logo">
                                    <a href="index.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="../assets/images/logo-dark.png" alt="" height="22">
                                        </span>
                                    </a>

                                    <a href="index.html" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="../assets/images/logo-light.png" alt="" height="22">
                                        </span>
                                    </a>
                                </div> -->

                                <div class="text-center mt-4">
                                    <h1 class="text-error">500</h1>
                                    <h3 class="mt-3 mb-2">Erro Interno do Servidor</h3>
                                    <p class="text-muted mb-3">Uma dica: Porque não tenta atualizar a página?</p>

                                    <a href="{{route('home')}}" class="btn btn-success waves-effect waves-light">Voltar ao Início</a>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
        <script>document.write(new Date().getFullYear())</script> Desenvolvido por <a href="https://porfiriodev.vercel.app" target="_blank" class="text-white-50">Porfírio</a>
        </footer>

        <!-- Vendor js -->
        <script src="{{url('assets/dashboard/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{url('assets/dashboard/js/app.min.js')}}"></script>

    </body>
</html>
