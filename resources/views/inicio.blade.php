@extends('layouts.base')
  @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="">
                      {{$user->email}}

                    </div>
                Estas logueado {{$user->name}}
<h1 class ""style="color:black"> que onda con estp</h1>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
