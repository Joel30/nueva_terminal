<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Nueva Terminal</title>
    <!-- Bootstrap Core CSS -->
    <link href=" {{asset('ample/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href=" {{asset('ample/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href=" {{asset('ample/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href=" {{asset('ample/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href=" {{asset('ample/css/colors/default.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
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
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="{{route('personal.index')}}">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        
                            <!--This is light logo icon--><img src="{{asset('ample/plugins/images/admin-logo-dark.png')}}" alt="home"
                                class="light-logo" />
                        </b>
                       
                            </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg"
                            href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    <!--li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i
                                    class="fa fa-search"></i></a> </form>
                    </li-->
                    <li>
                        <a class="profile-pic" href="#"> <img src="{{asset('ample/plugins/images/users/varun.jpg')}}" alt="user-img"
                                width="36" class="img-circle"><b class="hidden-xs">{{ (Auth::user()->personal->nombre) }}</b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
                            class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="" class="waves-effect"><i class="fa fa-clock-o fa-fw"
                                aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{route('personal.index')}}" class="waves-effect"><i class="fa fa-file-text fa-fw"
                                aria-hidden="true"></i>Personal</a>
                    </li>
                    <li>
                        <a href="{{route('usuario.index')}}" class="waves-effect"><i class="fa fa-users fa-fw"
                                aria-hidden="true"></i>Usuarios</a>
                    </li>
                    <li>
                        <a href="{{route('bus.index')}}" class="waves-effect"><i class="fa fa-automobile fa-fw"
                                aria-hidden="true"></i>Buses</a>
                    </li>
                    <li>
                        <a href="{{route('carril.index')}}" class="waves-effect"><i class="fa fa-road fa-fw"
                                aria-hidden="true"></i>Carril -  Anden</a>
                    </li>
                    <li>
                        <a href="{{route('departamento.index')}}" class="waves-effect"><i class="fa fa-map-marker fa-fw"
                                aria-hidden="true"></i>Departamento</a>
                    </li>
                    <li>
                        <a href="{{route('empresa.index')}}" class="waves-effect"><i class="fa fa-bank fa-fw"
                                aria-hidden="true"></i>Empresa de Transporte</a>
                    </li>
                    <li>
                        <a href="{{route('transporte.index')}}" class="waves-effect"><i class="fa fa-th-list fa-fw"
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        @yield('title')
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            @yield('breadcrumb')

                        </ol>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Gobierno Autónomo Municipal de Potosí | Sistemas </footer>
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
</body>

</html>