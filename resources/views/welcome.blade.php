
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  >
    </head>
    <body>
      <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top ">
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones">
       <span class="navbar-toggler-icon"></span>
     </button>

     <!-- logo -->
     <a class="navbar-brand" href="#">
       <img src="images/joker.png" alt="Logo" style="width:40px;">
     </a>

     <!-- enlaces -->
     <div class="collapse navbar-collapse" id ="opciones">
       <ul class="navbar-nav">

         <li class="nav-item">
           <a class="nav-link" href="/index"><h3>Inicio</h3></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="/register"><h3>Register</h3></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="/login"><h3>Login</h3></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="/faqs"><h3>faqs</h3></a>
         </li>
       </ul>
     </div>
    </nav>

    </header


        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>

</html>
