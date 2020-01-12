@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        dashboard - imaginem um monte de graficos bonitinhos e bla.
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $(".pagina_inicial").addClass("active");
        });
    </script>
@endsection