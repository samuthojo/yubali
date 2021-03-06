<!doctype html>

<html lang="en">

  <head>
    
    <title>Yubali</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="{{asset('images/logo.jpg')}}" rel="shortcut icon" type="image">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/yubali.css">
    
    <script src="/js/app.js"></script>
    
    @yield('styles')
    
  </head>
  
  <body>
    
    <div id="banner" class=""
      style="background-color: rgba(233, 236, 239, 0.4);">
      <img 
        src="/images/logo.jpg" 
        alt="Yubali Logo"
        id="logo">
      <div class="text-brown">
        <h4>The organisation of talented and skilled gospel musicians!</h4>
      </div>
      <div class="">
        <h5><strong>« <a class="text-brown normal" href="{{route('login')}}">Login</a> »</strong></h5>
      </div>
    </div>
    
    <nav class="navbar navbar-expand-sm navbar-light"
      style="background-color: rgba(233, 236, 239, 0.4);">

      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" 
          data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div 
          class="collapse navbar-collapse" 
          id="collapsibleNavbar">
          
          <ul class="navbar-nav">
            <li class="nav-item {{ isActiveRoute('main') }}">
              <a class="nav-link" 
                href="{{ route('main') }}">HOME</a>
            </li>
            <li class="nav-item {{ isActiveRoute('about') }}">
              <a class="nav-link" 
                href="{{ route('about') }}">ABOUT US</a>
            </li>
            <li class="nav-item {{ isActiveRoute('applications.apply') }}">
              <a class="nav-link" 
                href="{{ route('applications.apply') }}">REGISTRATION</a>
            </li>    
            <li class="nav-item {{ isActiveRoute('events.index') }}">
              <a class="nav-link"
                href="{{ route('events.index') }}">EVENTS</a>
            </li>    
            <li class="nav-item {{ isActiveRoute('contact') }}">
              <a class="nav-link" 
                href="{{ route('contact') }}">CONTACT US</a>
            </li>    
          </ul>
          
        </div>
      </div>
      
    </nav>
    
    <div class="container" style="margin-top:20px;">
      
      @if(session('successMessage'))
      <div class="row">
        <div class="col-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> <br>{{session('successMessage')}}
          </div>
        </div>
      </div>
      @endif

      @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      
      @yield('content')
      
    </div>

    <div class="jumbotron py-5 text-center" 
        style="margin-bottom:0; background-color: rgba(233, 236, 239, 0.4);">
      <p>
        <h4 class="text-brown"><i>Stay connected with us</i></h4>
        <a href="#" target="_blank" data-toggle="tooltip" title="Like our Facebook page"><i class="fa fa-facebook fa-2x mr-4"></i></a>
        <a class="text-danger" href="#" target="_blank"><i class="fa fa-youtube fa-2x mr-4" data-toggle="tooltip" title="Subscribe to our YouTube channel"></i></a>
        <a href="#" target="_blank"><i class="fa fa-twitter fa-2x" data-toggle="tooltip" title="Follow us on Twitter"></i></a>
      </p>
      <div class="col-sm-12">
        <span>Copyright  © {{Date('Y')}} <a href="" class="text-brown">YUBALI</a></span> |
        <span>All Rights Reserved.</span>
      </div>
    </div>

  </body>
</html>
