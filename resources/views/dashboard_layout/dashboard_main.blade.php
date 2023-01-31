<!DOCTYPE html>

<html lang="ar" style="height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/css/adminlte.min.css') }}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <style type="text/css" id="operaUserStyle"></style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
</head>

<body class="hold-transition sidebar-mini" style="height: 100%;">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></a></i>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/home') }}" class="nav-link">الرئيسية</a>
                </li>
                @if (Auth::user()->hasRole('Admin'))
                    <li class="nav-item d-none d-sm-inline-block"><a class="nav-link"
                            href="{{ route('users.index') }}">ادارة المستخدمين</a></li>
                    <li class="nav-item d-none d-sm-inline-block"><a class="nav-link"
                            href="{{ route('roles.index') }}">ادارة الصلاحيات</a></li>
                @endif
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto flaot-right">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

            <!-- Right navbar links -->
            {{-- <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('dashboard-assets/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('dashboard-assets/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('dashboard-assets/img/user3-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul> --}}
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('dashboard-assets/img/logo.jpg') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">بلال</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (Gate::forUser(Auth::user())->allows('teacher-list') || Gate::forUser(Auth::user())->allows('teacher-create'))
                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    المحفظين
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @if (Gate::forUser(Auth::user())->allows('teacher-list'))
                                    <li class="nav-item">
                                        <a href="{{ URL('/teacher') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>عرض المحفظين</p>
                                        </a>
                                    </li>
                                @endif
                                @if (Gate::forUser(Auth::user())->allows('teacher-create'))
                                <li class="nav-item">
                                    <a href="{{ URL('/teacher/create') }}" class="nav-link">
                                        <i class="nav-icon far fa-plus-square"></i>
                                        <p>إضافة محفظ</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @if (Gate::forUser(Auth::user())->allows('committee-list') || Gate::forUser(Auth::user())->allows('committee-create'))
                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    اللجان
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            
                            <ul class="nav nav-treeview" style="display: none;">
                                @if (Gate::forUser(Auth::user())->allows('committee-list'))
                                <li class="nav-item">
                                    <a href="{{ URL('/committees') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>عرض اللجان</p>
                                    </a>
                                </li>
                                @endif
                                @if (Gate::forUser(Auth::user())->allows('committee-create'))
                                <li class="nav-item">
                                    <a href="{{ URL('/committees/create') }}" class="nav-link">
                                        <i class=" nav-icon far fa-plus-square"></i>
                                        <p>إضافة لجان</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @if (Gate::forUser(Auth::user())->allows('student-create') ||Gate::forUser(Auth::user())->allows('student-list') )

                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    الطلاب
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @if (Gate::forUser(Auth::user())->allows('student-list'))
                                <li class="nav-item">
                                    <a href="{{ URL('/student') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>عرض الطلاب</p>
                                    </a>
                                </li>
                                @endif
                                @if (Gate::forUser(Auth::user())->allows('student-create'))
                                <li class="nav-item">
                                    <a href="{{ URL('/student/create') }}" class="nav-link">
                                        <i class="nav-icon far fa-plus-square"></i>
                                        <p>إضافة طالب</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @if (Gate::forUser(Auth::user())->allows('department-list') || Gate::forUser(Auth::user())->allows('department-create'))
                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    الأقسام
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @if (Gate::forUser(Auth::user())->allows('department-list'))
                                <li class="nav-item">
                                    <a href="{{ URL('/departments') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>عرض الأقسام</p>
                                    </a>
                                </li>
                                @endif
                                @if (Gate::forUser(Auth::user())->allows('department-create'))
                                <li class="nav-item">
                                    <a href="{{ URL('/departments/create') }}" class="nav-link">
                                        <i class="nav-icon far fa-plus-square"></i>
                                        <p>إضافة قسم</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif

                        @if (Gate::forUser(Auth::user())->allows('classes-list') || Gate::forUser(Auth::user())->allows('classes-create'))
                        <li class="nav-item menu-close">
                            
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    الحلقات
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                           
                            <ul class="nav nav-treeview" style="display: none;">
                                @if (Gate::forUser(Auth::user())->allows('classes-list'))
                                <li class="nav-item">
                                    <a href="{{ URL('/classes') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>عرض الحلقات</p>
                                    </a>
                                </li>
                                @endif
                                @if (Gate::forUser(Auth::user())->allows('classes-create'))
                                <li class="nav-item">
                                    <a href="{{ URL('/classes/create') }}" class="nav-link">
                                        <i class="nav-icon far fa-plus-square"></i>
                                        <p>إضافة حلقة</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @if (Auth::user()->hasRole('Admin'))
                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    الأرشيف
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ URL('/archive/teacher') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>أرشيف المحفظين</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ URL('/archive/student') }}" class="nav-link">
                                        <i class="nav-icon far fa-plus-square"></i>
                                        <p>أرشيف الطلاب</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endif
                    </ul>
                </nav>

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header" style="text-align: right">
                <div class="container-fluid">
                    <div class="row ">
                        <!-- /.col -->
                        <div class="col-md-12 ">
                            <h1 class="m-0 f">مركز بلال بن رباح </h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row" style="position: static;  display: inline;">
                        @yield('forms')
                        @yield('content')
                        
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>

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


            <!-- ./wrapper -->

            <!-- REQUIRED SCRIPTS -->

            <script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>
            <!-- jQuery -->
            <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
            <!-- Bootstrap 4 -->
            <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <!-- AdminLTE App -->
            <script src="{{ asset('dashboard-assets/js/adminlte.min.js') }}"></script>
            <script src="{{ asset('dashboard-assets/js/up_file.js') }}"></script>
            <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
            <script>
                $("input[data-bootstrap-switch]").each(function() {
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                })
            </script>

</body>


</html>
