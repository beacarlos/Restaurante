@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        onde coloca das coisas das mesas
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $(".mesas").addClass("active");
        });
    </script>
@endsection