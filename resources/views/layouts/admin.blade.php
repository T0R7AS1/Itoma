<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Itoma
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
  <script src=" {{ asset('assets/js/core/jquery.min.js ') }}"></script>

</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ Request::is('home*') ? 'active': ''}}">
            <a href="{{route('home')}}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="{{ Request::is('*create') ? 'active': ''}}">
            <a data-toggle="collapse" href="#menProducts" class="collapsed {{ Request::is('*create') ? 'text-primary': ''}}" aria-expanded="false">
                <i class="now-ui-icons objects_key-25 {{ Request::is('*create') ? 'text-primary': ''}}"></i>
                <p> Create <b class="caret"></b></p>
            </a>
            <div class="collapse" id="menProducts" style="">
                <ul class="nav">
                  <li class="{{ Request::is('companies/create') ? 'active': ''}}">
                    <a href="{{route('companies.create')}}">
                      <i class="now-ui-icons ui-1_simple-add"></i>
                      <span class="sidebar-normal"> Add company </span>
                    </a>
                  </li>
                  <li class="{{ Request::is('employes/create') ? 'active': ''}}">
                    <a href="{{route('employes.create')}}">
                      <i class="now-ui-icons design-2_ruler-pencil"></i>
                      <span class="sidebar-normal"> Add employe </span>
                    </a>
                  </li>
                </ul>
            </div>
          </li>

          <li class="{{ Request::is('companies') || Request::is('employes') ? 'active': ''}}">
            <a data-toggle="collapse" href="#womanProducts" class="collapsed {{ Request::is('companies') || Request::is('employes') ? 'text-primary': ''}}" aria-expanded="false">
                <i class="now-ui-icons ui-2_favourite-28 {{ Request::is('companies') || Request::is('employes') ? 'text-primary': ''}}"></i>
                <p> Tables <b class="caret"></b></p>
            </a>
            <div class="collapse" id="womanProducts" style="">
                <ul class="nav">
                  <li class="{{ Request::is('companies') ? 'active': ''}}">
                    <a href="{{route('companies.index')}}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <span class="sidebar-normal"> Companies list </span>
                    </a>
                  </li>
                  <li class="{{ Request::is('employes') ? 'active': ''}}">
                    <a href="{{route('employes.index')}}">
                        <i class="now-ui-icons text_align-left"></i>
                        <span class="sidebar-normal"> Employes list </span>
                    </a>
                  </li>
                </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel" style="background-color: white;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="{{route('home')}}">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="now-ui-icons users_single-02"></i>
                  </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            </ul>
          </div>
        </div>
      </nav>
      <div class="panel-header panel-header-xs pb-3 pt-5" style="height: 0;"></div>

      @include('errors.message')
      @yield('content')

      
    </div>
<!--   Core JS Files   -->
    <script src=" {{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src=" {{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- Chart JS -->
    <script src=" {{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src=" {{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src=" {{ asset('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script>
    <script src=" {{ asset('assets/demo/demo.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
    <script>
      $(document).ready( function () {
          $('#datatable').DataTable();
      });
    </script>
</body>

</html>