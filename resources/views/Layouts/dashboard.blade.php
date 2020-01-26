<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>Restaurante - Delicias de Delicias</title>
  
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}} ">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/sidebar.css') }}">
  
  <style>
    .wrapper {
      overflow: hidden;
    }
    
    ::-webkit-scrollbar-track {
      background-color: #F4F4F4;
    }
    ::-webkit-scrollbar {
      width: 6px;
      background: #F4F4F4;
    }
    ::-webkit-scrollbar-thumb {
      background: #dad7d7;
    }
    
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
      color: #fff;
      background-color: #6AC5BC !important;
    }
    
    .titulo {
      font-weight: bold; color: #008080;
    }
    
    .linha_titulo {
      border-bottom: 1px black solid; margin-right: 2%; 
    }
    
    .info_titulo {
      font-size: 12px; font-weight: bold; color: dimgrey;
    }
  </style>
  @yield('css')
</head>

<body class="hold-transition sidebar-mini" style="background-color: white !important;">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #76DCD1;">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
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
                <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
                <img src="{{ asset('dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
                <img src="#" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
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
            <span class="dropdown-item dropdown-header">15 Notifications</span>
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
      </ul>
    </nav>
    <!-- /.navbar -->
    
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-edicao elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link" style="background-color: #57AA9A !important;">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light" style="color: white; font-weight: bold !important;      ">Delicias de Delicias</span>
      </a>
      
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('/img_perfil/'.Auth::user()->imagem) }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
          {{ Auth::user()->nome }}
          </div>
        </div>
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{route('dashboard.view')}}" class="nav-link pagina_inicial" style="color: white !important;">
                <i class="fas fa-chart-bar nav-icon"></i>
                <p>
                  Página inicial
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('pedidos.index')}}" class="nav-link pedidos" style="color: white !important;">
                <i class="fas fa-clipboard-list nav-icon"></i>
                <p>
                  Pedidos
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('mesa.index')}}" class="nav-link mesas" style="color: white !important;">
                <i class="nav-icon fa fa-th"></i>
                <p>
                  Mesas
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('cardapio.index')}}" class="nav-link cardapio" style="color: white !important;">
                <i class="fas fa-utensils nav-icon"></i>
                <p>
                  Cardápio
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('genrencia.index')}}" class="nav-link gerente" style="color: white !important;">
                <i class="fas fa-suitcase nav-icon"></i>
                <p>
                  Gerente
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview item-cadastro">
              <a href="#" class="nav-link" style="color: white !important;">
                <i class="fas fa-plus-square nav-icon"></i>
                <p>
                  Cadastros
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('pessoa.listagem.view')}}" class="nav-link pessoas" style="color: white !important;">
                    <i class="far fa-user nav-icon"></i>
                    <p>Pessoas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index2.html" class="nav-link" style="color: white !important;">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Mesas</p>
                  </a>
                </li>
              </ul>
              
            <li class="nav-item"  style="    list-style-type: none; margin-top: 4rem; display: flex; justify-content: center; align-items: center;">
              <a href="{{ route('logout') }}" style="font-size: 16px; color: #fff; height: 41px; width: 100%;" class="nav-link gerente btn btn-danger btn-lg" style="color: white !important;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>
                <p>
                  sair
                </p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
            </li>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
      
      
      <!-- Content Wrapper. Contains page content -->
      <div class="container content-wrapper" style="background-color: white !important;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
              </div><!-- /.col -->
              <!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        
        <!-- Main content -->
        @yield('body')
        <!-- /.container-fluid -->
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    {{-- <script src="{{ asset('plugins/chart.js/Chart.min.js') }} "></script> --}}
    <script src="{{ asset('dist/js/demo.js') }} "></script>
    <script src="{{ asset('dist/js/pages/dashboard3.js') }} "></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>   
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script> 
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/locales.min.js') }}"></script>
    @yield('js')
  </body>
  </html>
  