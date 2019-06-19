<!doctype html>

<html lang="en">

  <head>
    
    <title>Yubali</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="{{asset('images/logo.jpg')}}" rel="shortcut icon" type="image">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/front-end.css">
    
    <script src="/js/app.js"></script>
    
    <style>
      #banner {
        padding: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
      }
      #logo {
        width: 150px; 
        object-fit: contain;
      }
    </style>
    
  </head>
  
  <body>
    
    <div id="banner" class="bg-secondary">
      <img 
        src="/images/logo.jpg" 
        alt="Yubali Logo"
        id="logo">
      <div class="text-white">
        <i>The organisation of talented and skilled gospel musicians!</i>
      </div>
      <div class="">
        <strong>« <a class="text-warning" href="#">Login</a> »</strong>
      </div>
    </div>
    
    <nav class="navbar navbar-expand-sm bg-light navbar-light">

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
            <li class="nav-item {{ isActiveRoute('register') }}">
              <a class="nav-link" 
                href="{{ route('register') }}">REGISTRATION</a>
            </li>    
            <li class="nav-item">
              <a class="nav-link"
                href="#">EVENTS</a>
            </li>    
            <li class="nav-item {{ isActiveRoute('contact') }}">
              <a class="nav-link" 
                href="{{ route('contact') }}">CONTACT US</a>
            </li>    
          </ul>
          
        </div>
      </div>
      
    </nav>
    
    <div class="container" style="margin-top:20px">
      
      @yield('content')
      
    </div>

    <div class="jumbotron py-5 text-center" style="margin-bottom:0">
      <p>
        <h4 class="text-maroon"><i>Stay connected with us</i></h4>
        <a href="https://www.facebook.com/tazarambeyasaccos.tambesaccoso" target="_blank" data-toggle="tooltip" title="Like our Facebook page"><i class="fa fa-facebook fa-2x mr-4"></i></a>
        <a class="text-danger" href="#" target="_blank"><i class="fa fa-youtube fa-2x mr-4" data-toggle="tooltip" title="Subscribe to our YouTube channel"></i></a>
        <a href="#" target="_blank"><i class="fa fa-twitter fa-2x" data-toggle="tooltip" title="Follow us on Twitter"></i></a>
      </p>
      <div class="col-sm-12">
        <span>Copyright  © {{Date('Y')}} <a href="" class="text-maroon">YUBALI</a></span> |
        <span>All Rights Reserved.</span>
      </div>
    </div>

  </body>
</html>
