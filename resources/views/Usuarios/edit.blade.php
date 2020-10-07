@extends('layouts.app')

@section('content')
<div class="container w-50 shadow">
<form role="form" action="{{ url('/usuarios/'.$usuario->id)}}" method="post" enctype="multipart/form-data" class="">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
    @include('usuarios.form', ['Modo'=>'editar'])
</form>
</div>
@endsection