@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        <!-- onde se coloca as coisas -->
        <h1 class="text-center col-sm-11 col-md-11 offset-1 text-bold text-light bg-dark" style="margin-bottom: 0px;">Mapa Mesas</h1>
        
        <div class="row col-sm-11 col-md-11 offset-1 bg-gradient-gray" style="">
            
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">01</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">05</button>
            <button Comportamento type='button' class="col-1 offset-5 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">13</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">17</button>
            <div class="w-100"></div>
            <div class="w-100"></div>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">02</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">06</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">09</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">11</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">14</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">18</button>
            <div class="w-100"></div>
            <div class="w-100"></div>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">03</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">07</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">10</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">12</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">15</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">19</button>
            <div class="w-100"></div>
            <div class="w-100"></div>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">04</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">08</button>
            <button Comportamento type='button' class="col-1 offset-5 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">16</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success rounded-circle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"
            style="border:none; padding: 10px; margin-top: 30px; text-align: center;">20</button>
            
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
<script>
    $(document).ready(function () {
        $(".mesas").addClass("active");
    });
    
    const a1 = document.querySelector('[Color-Change-G]')
    const a2 = document.querySelector('[Color-Change-R]')
    
    
    const botao = document.querySelectorAll("[Comportamento]");
    const arrayBotoes = []
    
    for (let i = 0; i < botao.length; i++) {
        botao[i].addEventListener("click", function (e) {
            console.log(`O elemento clicado foi o ${this.innerHTML}`);
            arrayBotoes.push(this)
        })
    }
    
    a1.onclick = function(e){
        e.preventDefault()
        arrayBotoes[arrayBotoes.length - 1].classList.replace('bg-danger', 'bg-success')
        
    }
    
    a2.onclick = function (e){
        e.preventDefault()
        arrayBotoes[arrayBotoes.length - 1].classList.replace('bg-success', 'bg-danger')
    }
</script>
@endsection