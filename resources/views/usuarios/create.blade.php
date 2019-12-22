@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
  <form action="/usuarios" method="POST">
    {{csrf_field()}}
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="name"  placeholder="escribe tu nombre">
  </div>
  <div class="form-group">
    <label for="email">Email </label>
    <input type="email" class="form-control" name="email"  placeholder="esribe tu email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">registrar</button>
  <button type="reset" class="btn btn-danger">eliminar</button>
</form>

   </div>
    </div>
      </div>
@endsection
