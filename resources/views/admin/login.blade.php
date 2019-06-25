<!doctype html>

<html lang="en">

  <head>
    
    <title>Yubali | Login</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="{{asset('images/logo.jpg')}}" rel="shortcut icon" type="image">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/yubali.css">
    
    <script src="/js/app.js"></script>
    
    <style>
      .card {
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }
    </style>    
    
  </head>
  
  <body>
    
    <div class="container d-flex align-items-center justify-content-center">
      
      <div class="card col-md-4">
        
        <div class="card-body">
          
          <div class="text-center mb-2">
            <img 
              src="/images/logo.jpg" 
              alt="Yubali Logo"
              style="width: 150px; object-fit: contain;">
          </div>
            
          <form class="" action="" method="post">
            
            @csrf
            
            <div class="row">
              <div class="form-group col-12">
                <label style="font-weight: bold;" for="username">Username:</label>
                <input type="text" name="username" class="form-control" 
                  value="{{old('username')}}" id="username"
                  placeholder="Username">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-12">
                <label style="font-weight: bold;" for="password">Password:</label>
                <input type="password" name="password" class="form-control" 
                  value="{{old('password')}}" id="password"
                  placeholder="Password">
              </div>
            </div>
            
            <button type="submit" class="btn btn-brown mb-2 float-right">Login</button>
          
          </form>
          
        </div>
        
      </div>
      
    </div>

    <div class="jumbotron py-5 text-center" 
        style="margin-bottom:0; background-color: rgba(233, 236, 239, 0.4);">
      <div class="col-sm-12">
        <span>Copyright  © {{Date('Y')}} <a href="" class="text-brown">YUBALI</a></span> |
        <span>All Rights Reserved.</span>
      </div>
    </div>

  </body>
</html>
