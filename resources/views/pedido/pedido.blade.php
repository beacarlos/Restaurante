@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        onde coloca das coisas dos pedidos
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