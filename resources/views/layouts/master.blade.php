<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Master Pengadaan</title>
    <meta charset = "UTF-8" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{!! asset('public/atlantis/assets/img/icon.ico') !!}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{!! asset('public/atlantis/assets/js/plugin/webfont/webfont.min.js') !!}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ["{!! asset('public/atlantis/assets/css/fonts.min.css') !!}"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{!! asset('public/atlantis/assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/atlantis/assets/css/atlantis.css') !!}">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link rel="stylesheet" href="{!! asset('public/atlantis/assets/css/demo.css') !!}"> --}}
  
    @yield('css')
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">

                <a href="{{ url('/home') }}" class="logo">
                    {{-- <img src="{!! asset('public/atlantis/assets/img/logo.svg') !!}" alt="navbar brand" class="navbar-brand"> --}}
                    <label alt="navbar brand" class="navbar-brand text-white"><h3><b>PENGADAAN</b></h3></label>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                       
                       
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{!! asset('public/atlantis/assets/img/profile.jpg') !!}" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="{!! asset('public/atlantis/assets/img/profile.jpg') !!}"
                                                    alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4>{!! Auth::user()->name !!}</h4>
                                                <p class="text-muted">hello@example.com</p><a href="profile.html"
                                                    class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">My Profile</a>
                                        <a class="dropdown-item" href="#">My Balance</a>
                                        <a class="dropdown-item" href="#">Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="{!! asset('public/atlantis/assets/img/profile.jpg') !!}" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    {!! Auth::user()->name !!}
                                    <span class="user-level">Administrator</span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    <li>
                                        <a href="#profile">
                                            <span class="link-collapse">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#edit">
                                            <span class="link-collapse">Edit Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#settings">
                                            <span class="link-collapse">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        {{-- <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Master</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ url('/pengadaan') }}">
                                            <span class="sub-item">Pengadaan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}

                        <li class="nav-item">
                            <a href="{{ url('home') }}">
                                <i class="fas fa-th"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pengadaan') }}">
                                <i class="fas fa-book"></i>
                                <p>Data Pengadaan</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ url('perencana-pengadaan') }}">
                                <i class="fas fa-calendar-check"></i>
                                <p>Perencana Pengadaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pelaksana-pengadaan') }}">
                                <i class="fas fas fa-cogs"></i>
                                <p>Pelaksana Pengadaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('manajemen-kontrak') }}">
                                <i class="fas fa-edit"></i>
                                <p>Manajemen Kontrak</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ url('penilaian/rekap') }}">
                                <i class="fas fa-chart-pie"></i>
                                <p>Rekap Penilaian Kinerja</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('manajemen-kontrak/rekap') }}">
                                <i class="fas fa-edit"></i>
                                <p>Rekap Kontrak</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('unit') }}">
                                <i class="fas  fa-building"></i>
                                <p>Unit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('mitra') }}">
                                <i class="fas  fa-users-cog"></i>
                                <p>Mitra</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('users') }}">
                                <i class="fas fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Help
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        2018, made with <i class="fa fa-heart heart text-danger"></i> by <a
                            href="http://www.themekita.com">ThemeKita</a>
                    </div>
                </div>
            </footer>
        </div>


        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="{!! asset('public/atlantis/assets/js/core/jquery.3.2.1.min.js') !!}"></script>
    <script src="{!! asset('public/atlantis/assets/js/core/popper.min.js') !!}"></script>
    <script src="{!! asset('public/atlantis/assets/js/core/bootstrap.min.js') !!}"></script>
    <!-- jQuery UI -->
    <script src="{!! asset('public/atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') !!}"></script>
    <script src="{!! asset('public/atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') !!}"></script>
    <!-- Bootstrap Toggle -->
    <script src="{!! asset('public/atlantis/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') !!}"></script>
    <!-- jQuery Scrollbar -->
    <script src="{!! asset('public/atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') !!}"></script>
    <!-- Atlantis JS -->
    <script src="{!! asset('public/atlantis/assets/js/atlantis.min.js') !!}"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    {{-- <script src="{!! asset('public/atlantis/assets/js/setting-demo2.js') !!}"></script> --}}
    <script>
        var nf = new Intl.NumberFormat()
    </script>
    @yield('js')
</body>

</html>
