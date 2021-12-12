<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Document Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

       <script src="{{ asset('js/app.js') }}" defer></script>
      
    </head>
    <body class="antialiased content">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            
              <a class="navbar-brand" href="/">Document Management System</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                    
               
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('upload-file') }}">Upload File</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">New Text File</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Send File</a>
                  </li>
                  
                    
                </ul>
                @endauth
                
              
                @if (Route::has('login'))
                         
                                @auth
                               
                                
                                 <li class="nav-item dropdown">
                                        <a class="nav-item dropdown-toggle" href="#" id="mydiv" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          {{auth()->user()->name}}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                          <a class="dropdown-item" href="{{ route('profile') }}">Profil</a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Kijelentkezés</a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                        </div>
                                      </li>
                                   
                                  
                            
                                @else
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                  <li class="nav-item">
                                    <a href="{{ route('login') }}" style="margin-right: 10px;">Bejelentkezés</a>
    
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Regisztráció</a>
                                    @endif
                                  </li>
                                </ul>
                                   
                                
                                @endauth
                           
                        @endif
                       
          
        </div>
          </nav>
        
    
          
            
            <main class="container">
              <div class="card">
                @include('partials.alerts')
                @yield('content')
              </div>
            </main>
      
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        
            
            <footer class="bg-dark text-center text-white" style="position: absolute; bottom:0; width:100%;">
             
              <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2021 Copyright:
                <a class="text-white" href="https://github.com/novichun">Novák Dániel</a>
              </div>
       
            </footer>
            

            
    </body>
</html>
