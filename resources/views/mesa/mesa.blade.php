@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        <!-- onde se coloca as coisas -->
        <h3 class="text-center col-sm-11 col-md-11 text-bold text-light bg-dark" style="margin-bottom: 0px; margin-left: 2.8%;">Mapa das mesas</h3>
        
        <div class="row col-sm-11 col-md-11 bg-gradient-gray container-mesas">
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="1">01</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="5">05</button>
            <button Comportamento type='button' class="col-1 offset-5 btnMesa" data-toggle="dropdown" id="13">13</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="17">17</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="2">02</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="6">06</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="9">09</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="11">11</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="14">14</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="18">18</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="3">03</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="7">07</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="10">10</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="12">12</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="15">15</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="19">19</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="4">04</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="8">08</button>
            <button Comportamento type='button' class="col-1 offset-5 btnMesa" data-toggle="dropdown" id="16">16</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="20">20</button>            
            
            <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header">Status</h6>
                <a Color-Change-G class="dropdown-item" href="#" ;">Disponível</a>
                <div class="dropdown-divider"></div>
                <a Color-Change-R class="dropdown-item" href="#" ;">Ocupado</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Link da Comanda" ;">Comanda</a>
            </div>
            
        </div>
        
        
        
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

@section('js')
<script src="{{ asset('js/mesa.js') }}"></script>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/mesa.css') }}">
@endsection