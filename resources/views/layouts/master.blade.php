<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/dist/js/plugins/jquery/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap 4 -->
{{--<script src="/dist/js/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
<!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <script src="/dist/js/headContnet.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/dist/js/mdb.min.js"></script>
    <script src="/dist/js/icheck.js"></script>
    <script src="/dist/js/jquery-confirm.min.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/dist/fonts/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.css">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="/dist/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="/dist/css/custom-style.css">
    <!-- Material Design Bootstrap -->
    <link href="/dist/css/mdb.css" rel="stylesheet">
    <link href="/dist/css/skins/square/_all.css" rel="stylesheet">
    <link href="/dist/css/jquery-confirm.min.css" rel="stylesheet">


</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('home') }}" class="nav-link">خانه</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
    {{--<form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>--}}

    <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <span>
                        <i class="fa fa-sign-out "></i>
                         خروج
                    </span>
                </a>
                {{--<div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    --}}{{--<span class="dropdown-item dropdown-header"></span>--}}{{--
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-key ml-2"></i> تغییر رمز عبور
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item">
                        <i class="fa fa-sign-out ml-2"></i>خروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>--}}
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                            class="fa fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light">پنل مدیریت</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <div>
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user8-128x128.jpg" class="img-circle elevation-2">
                    </div>
                    <div class="info">
                        <a href="" class="d-block">
                            {{ Auth::user()->person->fullName}}
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    @include('layouts.Menu')
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: rgba(169,169,169,0.19); min-height: calc(100vh - 57px)">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <section class="content">
                    {{--@include($view)--}}
                    @yield('content')
                </section>
                <section>
                    @yield('searchBox')
                </section>
                <section>
                    @yield('editBox')
                </section>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>

</html>


<script>
    $('.deleteEntity').click(function (e) {
        e.preventDefault();
        $.confirm({
            title: 'تاییدیه حذف...',
            content: 'آیا از حذف اطلاعات اطمینان دارید؟',
            type: 'red',
            typeAnimated: true,
            buttons: {
                yes: {
                    text: 'بله',
                    btnClass: 'btn-red',
                    action: function () {
                        $(e.target).closest('form').submit();
                    }
                },
                close: {
                    text: 'خیر',
                    btnClass: 'btn-white',
                    action: function () {
                    }
                }
            }
        });
    });

    @yield('javaScript')

</script>