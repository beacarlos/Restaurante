@extends('Layouts.dashboard')

@section('body')
<style>
.card {
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 28%;
  border-radius: 10px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 5px 14px;
  border-radius: 10px;
}
.preco {
    background-color: Tomato;
    margin-left: 60%;
    width: 40%;
    height: 15%;
    border-radius: 10px;
}
#valor{
    position:relative;
    color: white;
    margin-left: 10px;
    margin-top: 5px;
}
</style>

</head>
<body>

<div class="card">
  <img src="https://static-images.ifood.com.br/image/upload/f_auto,t_medium/pratos/712f2c3e-43ed-42b0-801b-38567e20c9bf/201910111339_gPTF_i.jpg" alt="W3Schools.com">
  <div class="container">
    <h4><b>Mistão para 03 pessoas</b></h4>
    <p>Mistao para tres pessos,(frango assado, linguiça, carne bovina,, uma porçao de baiao a moda, uma porçao de batata frita, vinagrete e farofa.)</p> 
  </div>
  <div class="preco">
    <h6 id="valor">Valor: R$ 48,90</h6>
  </div>
</div>

@endsection