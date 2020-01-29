@extends('Layouts.dashboard')

@section('body')
<div class="content container">
    <div class="row">
        <div class=" col-md-12 text-center justify-content-center">
            <img class="img-responsive" src="https://i.ibb.co/JRwYHF1/logo-removebg-preview-1.png" style="margin-bottom: 0%;" alt="">
            <p style="text-align: center;"><i class="fab fa-instagram nav-icon" style="font-weight: bold;"></i> @delicias_de_delicias</p>  
            <img class="img-responsive" src="{{ asset('img/p.jpeg') }}" style="margin-bottom: 0%;" alt="">

        </div> 
    </div>
</div>
<div class="content">
    <div class="container-fluid" class="align-content-center justify-content-center">
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