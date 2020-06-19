<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/image1.jpg')}}">
    <title>Nueva Terminal</title>
    <!-- Bootstrap Core CSS -->
    <!--link href=" {{asset('ample/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"-->

    <!-- Menu CSS -->
    <link href=" {{asset('ample/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href=" {{asset('ample/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href=" {{asset('ample/css/style.css')}}" rel="stylesheet">
    <link href=" {{asset('css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href=" {{asset('ample/css/colors/default.css')}}" id="theme" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('ample/bootstrap/bootstrap.min.css')}}" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('datatables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css')}}">


    <!--link href=" {{asset('ample/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header edit-body">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
            <div class="sticky-top">
                <div class="">
                    <nav class="navbar navbar-dark py-0" style="background-color:#ec0451;">
                        <b class="navbar-brand font-italic mr-3 px-2 rounded-pill" >Nueva Terminal</b>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                            <a class=" open-close nav-link pl-4 text-white"
                                    href="javascript:void(0)"><i class="fa fa-bars p-2 rounded-circle" style="background:#db0451"></i></a>
                            </li>
                        </ul>
                        
                        <div class="row">
                            <div class="col-12">
                                <a class="nav-link dropdown-toggle text-white py-0 px-3 rounded-pill" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background:#db0451">
                                    {{ Auth::user()->personal->nombre.' '.Auth::user()->personal->apellido_paterno }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>
                                        Cerrar Sesion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"></a>
                                </div>
                                <!-- <img src="{{asset('ample/plugins/images/users/varun.jpg')}}" alt="user-img" width="36" class="img-circle"> -->
                                
                            </div>
                            <!-- <div class="col-3 d-xl-none ">
                                <a class=" open-close nav-link  p-0 text-white"
                                    href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                            </div> -->
                        </div>        
                    </nav>
                </div>
            </div> 
       
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <div  class="navbar-default sidebar" style="background:#213952;" role="navigation" >
            <div class="sidebar-nav slimscrollsidebar">
                
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="{{route('home')}}" class="nav-link text-lb"><i class="fa fa-home fa-fw"
                                aria-hidden="true"></i>Home</a>
                    </li>
                    <li class="{{ Auth::user()->personal->cargo == 'Administrador' ? '' : 'd-none' }}">
                        <a href="{{route('personal.index')}}" class="nav-link text-lb"><i class="fa fa-file-text fa-fw"
                                aria-hidden="true"></i>Personal</a>
                    </li>
                    <li class="{{ Auth::user()->personal->cargo == 'Administrador' ? '' : 'd-none' }}">
                        <a href="{{route('usuario.index')}}" class="nav-link text-lb"><i class="fa fa-users fa-fw"
                                aria-hidden="true"></i>Usuarios</a>
                    </li>
                    <li class="{{ Auth::user()->personal->cargo == 'Administrador' ? 'd-none' : '' }}">
                        <a href="{{route('viaje.index')}}" class="nav-link text-lb"><i class="fa fa-desktop fa-fw text-primary"
                                aria-hidden="true"></i>Tablero</a>
                    </li>
                    <li class="{{ Auth::user()->personal->cargo == 'Administrador' ? 'd-none' : '' }}">
                        <a href="{{route('reporte')}}" class="nav-link text-lb"><i class="fa fa-book fa-fw"
                                aria-hidden="true"></i>Reporte</a>
                    </li>
                    <li class="{{ Auth::user()->personal->cargo == 'Administrador' ? 'd-none' : '' }}">
                        <a href="{{route('carril.index')}}" class="nav-link text-lb"><i class="fa fa-road fa-fw"
                                aria-hidden="true"></i>Carril -  Anden</a>
                    </li>
                    <li class="{{ Auth::user()->personal->cargo == 'Administrador' ? 'd-none' : '' }}">
                        <a href="{{route('departamento.index')}}" class="nav-link text-lb"><i class="fa fa-map-marker fa-fw"
                                aria-hidden="true"></i>Departamento</a>
                    </li>
                    <li class="{{ Auth::user()->personal->cargo == 'Administrador' ? 'd-none' : '' }}">
                        <a href="{{route('empresa.index')}}" class="nav-link text-lb"><i class="fa fa-bank fa-fw"
                                aria-hidden="true"></i>Empresa de Transporte</a>
                    </li>
                    <li class="{{ Auth::user()->personal->cargo == 'Administrador' ? 'd-none' : '' }}">
                        <a href="{{route('bus.index')}}" class="nav-link text-lb"><i class="fa fa-automobile fa-fw"
                                aria-hidden="true"></i>Buses</a>
                    </li>
                    <li class="{{ Auth::user()->personal->cargo == 'Administrador' ? 'd-none' : '' }}">
                        <a href="{{route('transporte.index')}}" class="nav-link text-lb"><i class="fa fa-th-list fa-fw"
                                aria-hidden="true"></i>Lista de Transporte</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-0 col-sm-6 col-md-4 col-lg-3">
                        <h4 class="page-title">@yield('title')</h4>
                    </div>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-9">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            @yield('breadcrumb')
                        </ol>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>

                <div class="row m-0">
                        @yield('box') 
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            @if (session('good'))
                                <div class="alert alert-success">
                                    <i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>{{ session('good') }}
                                </div>
                            @elseif (session('info'))
                                <div class="alert alert-info">
                                    <i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>{{ session('info') }}
                                </div>
                            @endif
                            @if (session('err'))
                                <div class="alert alert-warning">
                                    <i class="fa fa-warning fa-fw" aria-hidden="true"></i>{{ session('err') }}
                                </div>
                            @endif
                            
                            @yield('content')
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @yield('options')
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; Gobierno Autónomo Municipal de Potosí | Sistemas </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{asset('ample/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('ample/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{asset('ample/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{asset('ample/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('ample/js/waves.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('ample/js/custom.min.js')}}"></script>
    <script>
        function prevent_multiple_submits(){
            $('#register_btn').attr('disabled','disabled');
        }
    </script>
    <script type="text/javascript" src="{{asset('datatables/datatables.min.js')}}"></script>
    <script src="{{asset('js/datatable.js')}}"></script>
    @yield('scripts')
    
</body>

</html>