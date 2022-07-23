<!DOCTYPE html>
<html lang="en" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>AdCash</title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />

    <!-- GOOGLE FONTS -->
    <link href="{{asset('template/assets/plugins/material/css/materialdesignicons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('template/assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{asset('template/assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />


    <link href="{{asset('template/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />

    <link href="{{asset('template/assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

    <link href="{{asset('template/assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />

    <!-- MONO CSS -->
    <link rel="stylesheet" href="{{asset('template/assets/css/mono.css')}}" />

    <!-- CSS for Demo -->
    <link rel="stylesheet" href="{{asset('template/assets/options/optionswitch.css')}}" />

    <!-- FAVICON -->

    <!--
      HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{asset('template/assets/plugins/nprogress/nprogress.js')}}"></script>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">

<div id="toaster"></div>


<!-- ====================================
——— WRAPPER
===================================== -->
<div class="wrapper"  id="app" >


    <!-- ====================================
      ——— LEFT SIDEBAR WITH OUT FOOTER
    ===================================== -->
@include('layout.sidebar')

<!-- ====================================
    ——— PAGE WRAPPER
    ===================================== -->
    <div class="page-wrapper">
        <!-- Header -->
        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
        <div class="content-wrapper">
            <div class="content">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        @include('layout.footer')
    </div>
</div>

<script src="{{asset('template/assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/simplebar/simplebar.min.js')}}"></script>
<!-- JS for Demo -->
<script src="{{mix('js/app.js')}}"></script>

</body>

</html>
