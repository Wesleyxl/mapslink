<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- jQuery -->
    <script src="{{ URL::to('/public/assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ URL::to('/public/assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ URL::to('/public/assets/dashboard/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/adm" class="nav-link">Início</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">{{ count($notifications) }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        @foreach ($notifications as $notification)
                            <a href="{{ url('/adm/email/ler/'.$notification['id']) }}" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    {{-- <img src="{{ URL::to('/public/assets/dashboard/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle"> --}}
                                    <i class="fa-regular fa-envelope" style="font-size: 40px; margin-right: 15px"></i>
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            {{ $notification['to'] }}
                                            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">{{ $notification['subject'] }}</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $notification['time'] }}</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                        <a href="{{ route('dashboard-email') }}" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                    alt="Sair"
                    title="Sair"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li> --}}
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        {{-- <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{ URL::to('/public/assets/dashboard/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
        </a> --}}

        <!-- Sidebar -->
        <div style="margin-top: 0;" class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ URL::to('/public/assets/dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link @yield('a-home')">
                                    <i class="fas fa-home nav-icon"></i>
                                    <p>Início</p>
                                </a>
                            </li>
                            <li class="nav-header">Páginas</li>

                            <!-- category -->
                            <li class="nav-item @yield('ul-category')">
                                <a href="#" class="nav-link @yield('li-category')">
                                    <i class="fa-solid fa-list nav-icon"></i>
                                    <p>
                                        Categorias
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard-category-create') }}" class="nav-link @yield('a-category-create')">
                                            <i class="fas fa-plus nav-icon"></i>
                                            <p>Cadastrar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard-category') }}" class="nav-link @yield('a-category')">
                                            <i class="fa-solid fa-eye"></i>
                                            <p>Visualizar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end category -->

                            <!-- subcategory -->
                            <li class="nav-item @yield('ul-subcategory')">
                                <a href="#" class="nav-link @yield('li-subcategory')">
                                    <i class="fa-solid fa-list nav-icon"></i>
                                    <p>
                                        Subcategorias
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard-subcategory-create') }}" class="nav-link @yield('a-subcategory-create')">
                                            <i class="fas fa-plus nav-icon"></i>
                                            <p>Cadastrar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard-subcategory') }}" class="nav-link @yield('a-subcategory')">
                                            <i class="fa-solid fa-eye"></i>
                                            <p>Visualizar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end subcategory -->

                            <!-- company -->
                            <li class="nav-item @yield('ul-company')">
                                <a href="#" class="nav-link @yield('li-company')">
                                    <i class="fas fa-building nav-icon"></i>
                                    <p>
                                        Empresas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard-company-create') }}" class="nav-link @yield('a-company-create')">
                                            <i class="fas fa-plus nav-icon"></i>
                                            <p>Cadastrar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard-company') }}" class="nav-link @yield('a-company')">
                                            <i class="fa-solid fa-eye"></i>
                                            <p>Visualizar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end company -->

                            <!-- highlights -->
                            <li class="nav-item @yield('ul-highlight')">
                                <a href="#" class="nav-link @yield('li-highlight')">
                                    <i class="fas fa-star nav-icon"></i>
                                    <p>
                                        Destaque
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard-highlight') }}" class="nav-link @yield('a-highlight')">
                                            <i class="fa-solid fa-eye"></i>
                                            <p>Visualizar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end highlights -->

                            <!-- contato -->
                            <li class="nav-item @yield('ul-contact')">
                                <a href="#" class="nav-link @yield('li-contact')">
                                    <i class="fas fa-envelope nav-icon"></i>
                                    <p>
                                        Emails
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard-email-create') }}" class="nav-link @yield('a-contact-create')">
                                            <i class="fas fa-plus nav-icon"></i>
                                            <p>Enviar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard-email') }}" class="nav-link @yield('a-contact')">
                                            <i class="fa-solid fa-eye"></i>
                                            <p>visualizar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end contato -->

                            <li class="nav-header">Configurações</li>

                            <!-- my account -->
                            <li class="nav-item @yield('ul-user')">
                                <a href="#" class="nav-link @yield('li-user')">
                                    <i class="fas fa-user-cog nav-icon"></i>
                                    <p>
                                        Minha conta
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard-user') }}" class="nav-link @yield('a-user')">
                                            <i class="fas fa-pencil-alt nav-icon"></i>
                                            <p>Configurar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end my account -->

                            <!-- Website config -->
                            <li class="nav-item @yield('ul-website')">
                                <a href="#" class="nav-link @yield('li-website')">
                                    <i class="fa-solid fa-gears nav-icon"></i>
                                    <p>
                                        Website
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard-website') }}" class="nav-link @yield('a-website')">
                                            <i class="fas fa-pencil-alt nav-icon"></i>
                                            <p>Configurar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end website config -->

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <main>
                    @yield('content')
                </main>

            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2020-2022 <a href="https://www.wesley-alves.com">Wesley Alves</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Versão</b> 3.5.0
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery UI 1.11.4 -->
        <script src="{{ URL::to('/public/assets/dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- ChartJS -->
        <script src="{{ URL::to('/public/assets/dashboard/plugins/chart.js/Chart.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ URL::to('/public/assets/dashboard/plugins/sparklines/sparkline.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{ URL::to('/public/assets/dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ URL::to('/public/assets/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ URL::to('/public/assets/dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ URL::to('/public/assets/dashboard/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ URL::to('/public/assets/dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ URL::to('/public/assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ URL::to('/public/assets/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ URL::to('/public/assets/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ URL::to('/public/assets/dashboard/dist/js/adminlte.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ URL::to('/public/assets/dashboard/dist/js/demo.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ URL::to('/public/assets/dashboard/dist/js/pages/dashboard.js') }}"></script>
        <!-- other -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(function () {
                //Add text editor
                $('#compose-textarea').summernote({
                    height: 300,
                });
                $('#compose-textarea2').summernote({
                    height: 150,
                })
            })
        </script>
    </body>
</html>
