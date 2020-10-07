

@extends('layouts.app')

@section('content')
  
  <div class="container">
  @if (Session::has('mensaje'))
  <p class="text-success">    {{Session::get('mensaje')}}</p>
  @endif
    <a type="button" class="btn btn-success mb-4" href="{{url('usuarios/create')}}">Agregar Usuario</a >
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Foto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($usuarios as $usuario)  
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>
            <img class="img-fluid" src="{{ asset('storage').'/'.$usuario->Foto}}" alt="" width="200" higth="100">
            </td>
            <td>{{$usuario->Nombre}}</td>
            <td> 
            <div class="form-inline">
                
                <button type="button" class="btn btn-primary mr-1"  data-toggle="modal" data-target="#ver{{ $usuario->id }}">
                 Ver
                </button>
                <a class='btn btn-primary mr-1' href="{{url('usuarios/'.$usuario->id.'/edit')}}" >Editar</a>
                <form method="post" action="{{ url('/usuarios/'.$usuario->id) }}">
                {{csrf_field()}}
                {{ method_field('DELETE')}}
                <button type="submit" onclick="return confirm('¿borrar?')" class="btn btn-primary">Borrar</button>
                
            </div>
            </td>
          </tr>
          <!-- Modal Detalle-->
        <div class="modal fade" id="ver{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle de Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <p>Nombre: {{$usuario->Nombre}}</p>
                  <p>Apellido: {{$usuario->Apellidos}}</p>
                  <p>Telefono: {{$usuario->Telefono}}</p>
                  <p>Cargo: {{$usuario->Cargo}}</p>
                  <p>Email: {{$usuario->Email}}</p>
                  <p>Identificacion:{{$usuario->Identificacion}}</p>
                  <p>Residencia: {{$usuario->Residencia}}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
          @endforeach
        </tbody>
      </table>
        
        

  </div>
@endsection
    
