<!doctype html>

<html lang="en">

  <head>
    
    <title>Tazara Saccos</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="{{asset('images/fav.png')}}" rel="shortcut icon" type="image">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/front-end.css">
    
    <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    <script src="/js/front-end.js"></script>
    
  </head>
  
  <body>

    <div class="jumbotron py-2" style="margin-bottom:0;">
      
      <div class="container d-flex flex-wrap">
        
        <div class="mx-auto mx-sm-0">
          <img src="{{asset('images/tazara_logo.png')}}" alt="SACCOS LOGO">
        </div>
        
        <div class="mx-auto mx-sm-0 ml-sm-4 pt-sm-5">
          <h1>Tazara Mbeya Saccos Limited</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit!</p>
        </div>
        
        <div class="ml-auto ml-sm-5 pl-sm-5 mt-sm-2 pt-sm-5">
          <strong>« <a class="center" href="{{route('admin_login')}}">Login</a> »</strong>
        </div>
        
      </div>
       
    </div>

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
      {{--<a class="navbar-brand" href="{{route('main')}}">Tazara Saccos</a>--}}
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" 
          data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{isActiveRoute('main')}}" 
                href="{{route('main')}}">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{isActiveRoute('about_us')}}" 
                href="{{route('about_us')}}">ABOUT US</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{areActiveURLs(['loans', 'loans/1', 'loans/2', 'loans/3'])}}" 
                href="{{route('loans')}}">LOANS</a>
            </li>    
            <li class="nav-item">
              <a class="nav-link {{isActiveRoute('gallery')}}"
                href="{{route('gallery')}}">GALLERY</a>
            </li>    
            <li class="nav-item">
              <a class="nav-link {{isActiveRoute('contact_us')}}" 
                href="{{route('contact_us')}}">CONTACT US</a>
            </li>    
          </ul>
        </div>
      </div>  
    </nav>

    <div class="container" style="margin-top:30px">
      
      @yield('content')
      
    </div>

    <div class="jumbotron py-5 text-center" style="margin-bottom:0">
      <p>
        <h4 class="text-success"><i>Stay connected with us</i></h4>
        <a href="https://www.facebook.com/tazarambeyasaccos.tambesaccoso" target="_blank" data-toggle="tooltip" title="Like our Facebook page"><i class="fa fa-facebook fa-2x mr-4"></i></a>
        <a class="text-danger" href="#" target="_blank"><i class="fa fa-youtube fa-2x mr-4" data-toggle="tooltip" title="Subscribe to our YouTube channel"></i></a>
        <a href="#" target="_blank"><i class="fa fa-twitter fa-2x" data-toggle="tooltip" title="Follow us on Twitter"></i></a>
      </p>
      <div class="col-sm-12">
        <span>Copyright  © {{Date('Y')}} <a href="{{route('main')}}" class="text-primary">TAZARA MBEYA SACCOS</a></span> |
        <span>Powered By <a href="http://kamadigitals.com/" target="_blank" class="text-muted">KAMA DIGITALS</a></span> |
        <span>All Rights Reserved.</span>
      </div>
    </div>

  </body>
</html>
