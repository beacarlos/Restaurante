@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        <h4 class="titulo"><i class="fas fa-clipboard-list nav-icon"></i> Pedidos</h4>
        <div class="row d-flex linha_titulo"></div>
        <p class="info_titulo">Lista de pedidos.</p>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $(".pedidos").addClass("active");
        });
    </script>
@endsection