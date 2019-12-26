@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h3>editar usuario:{{$user->name}}</h3>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action="{{route('usuarios.update' , $user->id) }}"enctype="multipart/form-data" method="POST" >
    @method ('PATCH')
    @csrf

      <label for="avatar"></label>
        <img width ="100px" src="{{Storage::url($user->avatar)}}">
      <input type="file"  name="avatar" >



  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="escribe tu nombre">
  </div>
  <div class="form-group">
    <label for="email">Email </label>
    <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="esribe tu email">
  </div>

  <button type="submit" class="btn btn-primary">guardar cambios</button>
  <button type="reset" class="btn btn-danger">eliminar</button>
</form>

   </div>
    </div>
      </div>
@endsection
