@extends('layouts.app')
@section('content')
    <h1>Bienvenid@ {{Auth::user()->name}} a su Panel de Administrador</h1>
@endsection
