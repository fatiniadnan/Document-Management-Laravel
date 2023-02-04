<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>IEF Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

       <script src="{{ asset('js/app.js') }}" defer></script>
       <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

        <!-- Custom styles for this template -->
        <link href="css/simple-sidebar.css" rel="stylesheet">
       
    </head>

    <body class="antialiased content">

   
      <div id="main-wrapper">

        <!-- Page Content -->
        <div id="main-content">
        	<!-- navbar start -->
        	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed">
			    <a class="navbar-brand ms-4 me-4" href="/">IEF Management System</a>
			  	<!-- sidebar collapse button ## mobile view -->
          @auth
				<ul class="navbar-nav  d-flex align-items-center ">
			      <li class="nav-item active mobile-view">
			        <a class="nav-link d-flex align-items-center" id="menu-toggle">
			        	<i class="material-icons">Hi, {{auth()->user()->name}}!</i>
			        	<span class="sr-only"></span></a>
			      </li>
			  	</ul>
			  	<!-- end sidebar collapse button ## mobile view -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  
        <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav d-flex align-items-center">
			      
            <li class="nav-item active">
			        <a class="nav-link d-flex align-items-center" href="/"  id="menu-toggle">Home</a>
			      </li>
			      
            <li class="nav-item">
			        <a class="nav-link" href="{{ route('profile') }}">Profile</a>
			      </li>
            
            <li class="nav-item">
			        <a class="nav-link" href="{{ route('user.index') }}">User</a>
			      </li>
			     
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="mydiv" role="button" data-toggle="dropdown" aria-haspopup="true" 
                aria-expanded="false"> File </a>    
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                  <a class="dropdown-item" href="/">Index</a>        
                  <a class="dropdown-item" href="{{ route('upload-file') }}">Upload File</a>
                  <a class="dropdown-item" href="{{ route('text.new') }}">New Text File</a>
                  <a class="dropdown-item" href="{{ route('send.send') }}">Send File</a>

                </div>
            </li>

			      
            <li class="nav-item">
			        <a class="nav-link" href="{{ url('chatify') }}">IEF Messenger</a>
			      </li>
			    </ul>
          @endauth
          </div>


          @if (Route::has('login'))
                         
                         @auth
                          <ul class="nav navbar-nav navbar-right px-5 mx-5">
                          <li class="nav-item dropdown w-fit">

                              <a class="nav-item dropdown-toggle" href="#" id="mydiv" role="button" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false" style="color:aliceblue">
                                {{auth()->user()->name}}
                              </a>

                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('profile') }}">Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>

                              </div>
                          </li>  

                          </ul>
                                       
                     
                         @else
                         <div class="text-end">
                         <a href="{{ route('login') }}" style="margin-right: 30px; font-size:x-large">Login</a>
                         <a style="margin-right: 30px; font-size:x-large; color:black"> | </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" style="margin-right: 50px; font-size:x-large">Register</a>
                            @endif

                         </div>
                                                      
                         @endauth
                    
          @endif
         
          </nav>
			<!-- navbar ends -->

    </div>
    <!-- main content -->
      </div>
      <!-- wrapper -->

          <!-- Bootstrap core JavaScript -->
          <script src="js/jquery.min.js"></script>
          <script src="js/bootstrap.bundle.min.js"></script>

          <!-- Menu Toggle Script -->
          <script>
            
          $("#menu-toggle").click(function(e) {

              e.preventDefault();
              $("#main-wrapper").toggleClass("toggled");
            
            });

          </script>
      

          
            
            <main class="container">
              <div class="card">
                @include('partials.alerts')
                @yield('content')
              </div>
            </main>
      
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        
            
            <footer class="bg-light text-center text-black" style="position:fixed; bottom:0; width:100%; margin-top:40px;">
             
              <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022 Copyright:
                <a class="text-black" href="#">Fatini Adnan</a>
              </div>
       
            </footer>
            

            
    </body>
</html>
