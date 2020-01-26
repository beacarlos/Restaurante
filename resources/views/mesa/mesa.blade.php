@extends('Layouts.dashboard')

@section('css')
<style>
    .btnMesa {
        outline: none !important;
        border:none; 
        padding: 22px; 
        margin-top: 30px; 
        text-align: center;
        width: 70px;
        height: 70px;
        padding: 10px 16px;
        border-radius: 35px;
        font-size: 20px;
        line-height: 1.33;
    }
    .container-mesas {
        padding-right: 7%;
        padding-bottom: 2%;
        margin-left: 2.8%;
    }
</style>
@endsection

@section('body')
<div class="content">
    <div class="container-fluid">
        <!-- onde se coloca as coisas -->
        <h3 class="text-center col-sm-11 col-md-11 text-bold text-light bg-dark" style="margin-bottom: 0px; margin-left: 2.8%;">Mapa das mesas</h3>
            <div class="row col-sm-11 col-md-11 bg-gradient-gray container-mesas">
                <input type="button" Comportamento class="col-1 offset-1 bg-danger btnMesa" data-toggle="dropdown" name="mesa" value="1" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="5" />
                <input type="button" Comportamento class="col-1 offset-5 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="13" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="17" />
                <div class="w-100"></div>
                <div class="w-100"></div>
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="2" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="2" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="6" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="9" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="11" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="14" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="18" />
                <div class="w-100"></div>
                <div class="w-100"></div>
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="3" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="7" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="10" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="12" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="15" />
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="19 /">
                <div class="w-100"></div>
                <div class="w-100"></div>
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="4">
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="8">
                <input type="button" Comportamento class="col-1 offset-5 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="16">
                <input type="button" Comportamento class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" name="mesa" value="20">
                
                <div class="dropdown-menu dropdown-menu-right">
                    <h6 class="dropdown-header">Status</h6>

                    <a Color-Change-G class="dropdown-item" href="#" ;">Disponível</a>
                    <div class="dropdown-divider"></div>

                    <a Color-Change-R class="dropdown-item" href="#" ;">Ocupado</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">Comanda</a>

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
        console.log(botao[0].dataset.mesa);
        const arrayBotoes = []
        
        for (let i = 0; i < botao.length; i++) {
            botao[i].addEventListener("click", function (e) {
                console.log(`O elemento clicado foi o ${this.innerHTML}`);
                arrayBotoes.push(this)
            })
        }
        
        a1.onclick = function(e){
            e.preventDefault();
            arrayBotoes[arrayBotoes.length - 1].classList.replace('bg-success', 'bg-danger');
            console.log("hsdhds");
        }
        
        a2.onclick = function (e){
            e.preventDefault();
            arrayBotoes[arrayBotoes.length - 1].classList.replace('bg-danger', 'bg-success');
        }
    </script>
@endsection