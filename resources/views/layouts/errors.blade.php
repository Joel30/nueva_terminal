<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        

        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/image1.jpg')}}">
        <title>Nueva Terminal</title>
        <!-- Bootstrap Core CSS -->
        <link href=" {{asset('ample/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

        <link href=" {{asset('ample/css/animate.css')}}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href=" {{asset('ample/css/style.css')}}" rel="stylesheet">
        <!-- color CSS -->
        <link href=" {{asset('ample/css/colors/default.css')}}" id="theme" rel="stylesheet">


    </head>

    <body>
        <!-- Preloader -->
        <section id="wrapper" class="error-page">
            <div class="error-box">
                <div class="error-body text-center">
                    <h1 class="text-danger">@yield('err')</h1>
                    <h3 class="text-uppercase">@yield('first_message')</h3>
                    <p class="text-muted m-t-30 m-b-30">@yield('second_message')</p>
                    <a onclick="history.back(-1);" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">Regresar</a> </div>
                <footer class="footer text-center">2020 © Gobierno Autónomo Municipal de Potosí | Sistemas</footer>
            </div>
        </section>
        <!-- jQuery -->
        <script src="{{asset('ample/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('ample/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    </body>
</html>
