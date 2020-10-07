<div class="form-group mt-3">
        <label for="Nombre">{{'Nombre'}}</label>
        <input type="text" class="form-control" id="Nombre" name="Nombre" 
        value="{{ isset($usuario->Nombre)?$usuario->Nombre:''}}"
        >
    </div>
    <div class="form-group">
        <label for="Apellidos">{{'Apellidos'}}</label>
        <input type="text" class="form-control" id="Apellidos" name="Apellidos" 
        value="{{ isset($usuario->Apellidos)?$usuario->Apellidos:''}}">
    </div>
    <div class="form-group">
        <label for="Telefono">{{'Telefono'}}</label>
        <input type="number" class="form-control" id="Telefono" name="Telefono" 
        value="{{ isset($usuario->Telefono)?$usuario->Telefono:''}}">
    </div>
    <div class="form-group">
        <label for="Cargo">{{'Cargo'}}</label>
        <input type="text" class="form-control" id="Cargo" name="Cargo" 
        value="{{ isset($usuario->Cargo)?$usuario->Cargo:''}}">
    </div>
    <div class="form-group">
        <label for="Email">{{'Email'}}</label>
        <input type="email" class="form-control" id="Email" name="Email" 
        value="{{ isset($usuario->Email)?$usuario->Email:''}}">
    </div>
    <div class="form-group">
        <label for="Identificacion">{{'Identificacion'}}</label>
        <input type="text" class="form-control" id="Identificacion" name="Identificacion" 
        value="{{ isset($usuario->Identificacion)?$usuario->Identificacion:''}}">
    </div>
    <div class="form-group">
        <label for="Residencia">{{'Residencia'}}</label>
        <input type="text" class="form-control" id="Residencia" name="Residencia" 
        value="{{ isset($usuario->Residencia)?$usuario->Residencia:''}}">
    </div>
    <div class="form-group">
        <label for="Foto">{{'Foto'}}</label>
        
        @if (isset($usuario->Foto))
            <img class="img-fluid" src="{{ asset('storage').'/'.$usuario->Foto}}" alt="" width="200" higth="200">
        @endif
        
        <input type="file" class="form-control" id="Foto" name="Foto" 
        value="{{ isset($usuario->Foto)?$usuario->Foto:''}}">
    </div>
    <input type="submit" class="btn btn-primary mb-3" value="{{$Modo=='crear' ? 'Agregar ':'Modificar '}}"></input>
    <a href="{{url('usuarios')}}" class="btn btn-danger mb-3">Regresar</a>
