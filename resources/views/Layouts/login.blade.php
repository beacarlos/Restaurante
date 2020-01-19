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
      .content {
        overflow: hidden;
        background-color: #f1f1f1;
      }
    </style>
    @yield('css')
  </head>

  <body class="content">
    @yield('body')
  </body>
</html>