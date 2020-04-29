@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/master.css">
    <title>perfil</title>
  </head>
  <body>
  <main class"body">
<section class="content">
<div class="row">
  <div class="col-sm-12">
      <form action="{{route('home' , $user->id) }}"enctype="multipart/form-data" method="POST" >
        @csrf

    <label for="avatar"></label>
      <img width ="100px" src="{{Storage::url($user->avatar)}}">
     <input type="file"  name="avatar" >
   </form>
  </div>

</div>


</section>
  </main>

  </body>
</html>


@endsection
