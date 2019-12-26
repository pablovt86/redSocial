@extends('layouts.app')
@section('content')
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <img width ="100px" src="{{Storage::url($user->avatar)}}">
      <h1 class="display-4">{{$user->name}}</h1>
      <p class="lead">{{$user->email}}</p>
    </div>
  </div>
@endsection
