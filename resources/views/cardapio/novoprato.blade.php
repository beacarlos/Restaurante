@extends('Layouts.dashboard')

@section('body')
<div>
    <p>novo prato</p>
    <div class="form-group">
                  <label for="exampleFormControlSelect1">Example select</label>
                  <!-- <select class="form-control" id="exampleFormControlSelect1" name="descricaoCat">
                   <option value="">Clique aqui</option>
                   
                   @foreach ($consultCatPrato as $descricao)
                      <option value="{{$descricao->categoria_prato_id}}"> {{$descricao->descricao}}</option>
                   @endforeach 
                  </select>-->
              </div>
</div>
@endsection