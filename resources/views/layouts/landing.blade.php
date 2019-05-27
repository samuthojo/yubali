<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Dominion Consult</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  {{--<link href="" rel="shortcut icon" type="image">--}}
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/landing.css">
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat" 
    rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" 
    rel="stylesheet" type="text/css">
  
  {{--<script src="/js/manifest.js"></script>--}}
  <script src="/js/app.js"></script>
  <script src="/js/landing.js"></script>
  
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    
    <div class="navbar-header">
      
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
      <a class="navbar-brand" href="#myPage">DominionConsult</a>
      
    </div>
                
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#portfolio">PORTFOLIO</a></li>
        <li><a href="#contact">CONTACT</a></li>
      </ul>
    </div>
    
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>DominionConsult</h1> 
  <p>We specialize in consultancy services</p> 
  {{--<form class="form-inline">
    <div class="input-group">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Subscribe</button>
      </div>
    </div>
  </form>--}}
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>About Company</h2><br>
      <h4 class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <br><a class="btn btn-default btn-lg" id="#getInTouch" href="#contact">Get in Touch</a>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Our Values</h2><br>
      <h4 class="text-justify"><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p class="text-justify"><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="fa fa-search logo-small"></span>
      <h4>RESEARCH</h4>
      <p>Researching and collaborations in research</p>
    </div>
    <div class="col-sm-4">
      <span class="fa fa-file-pdf-o logo-small"></span>
      <h4>STRUCTURING PROPOSALS</h4>
      <p>Organizing research ideas to well structured proposals</p>
    </div>
    <div class="col-sm-4">
      <span class="fa fa-book logo-small"></span>
      <h4>PROOF-READING, REVIEW AND EDITING</h4>
      <p>Proof reading, review and  editing of reports, papers and books</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="fa fa-handshake-o logo-small"></span>
      <h4>TRAINING AND MENTORING</h4>
      <p>Training, mentoring, coaching and incubating innovations for sustainable development</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>AGRIBUSINESS</h4>
      <p>Active promotion of agriculture as business</p>
    </div>
    <div class="col-sm-4">
      <span class="fa fa-desktop logo-small"></span>
      <h4 style="color:#303030;">ICT SERVICES</h4>
      <p>ICT advice and support to facilitate efficient operations of companies, businesses and organizations</p>
    </div>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  {{--<h2>Portfolio</h2><br>
  <h4>Organizations we have worked with</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="{{asset('images/paris.jpg')}}" alt="Paris" width="400" height="300">
        <p><strong>Paris</strong></p>
        <p>Yes, we built Paris</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="{{asset('images/newyork.jpg')}}" alt="New York" width="400" height="300">
        <p><strong>New York</strong></p>
        <p>We built New York</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="{{asset('images/sanfran.jpg')}}" alt="San Francisco" width="400" height="300">
        <p><strong>San Francisco</strong></p>
        <p>Yes, San Fran is ours</p>
      </div>
    </div>
  </div><br>--}}
  
  <h2>What our customers say</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"My proposal was a big success, Thank you!"<br><span>Dr. Gideon Thomas, DIT</span></h4>
      </div>
      <div class="item">
        <h4>"My research wouldn't have gone without you!"<br><span>Blessing Lyatuu, MUCE</span></h4>
      </div>
      <div class="item">
        <h4>"This company is the best. I am grateful!"<br><span>Grace Thomas, Author</span></h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- Container (Pricing Section) -->
{{--<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2>Pricing</h2>
    <h4>Choose a payment plan that works for you</h4>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Basic</h1>
        </div>
        <div class="panel-body">
          <p><strong>20</strong> Lorem</p>
          <p><strong>15</strong> Ipsum</p>
          <p><strong>5</strong> Dolor</p>
          <p><strong>2</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>$19</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Pro</h1>
        </div>
        <div class="panel-body">
          <p><strong>50</strong> Lorem</p>
          <p><strong>25</strong> Ipsum</p>
          <p><strong>10</strong> Dolor</p>
          <p><strong>5</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>$29</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>      
    </div>       
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Premium</h1>
        </div>
        <div class="panel-body">
          <p><strong>100</strong> Lorem</p>
          <p><strong>50</strong> Ipsum</p>
          <p><strong>25</strong> Dolor</p>
          <p><strong>10</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>$49</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>      
    </div>    
  </div>
</div>--}}

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Dar Es Salaam, Tanzania</p>
      <p><span class="glyphicon glyphicon-phone"></span> +255 715 397 758 | +255 754 397 758</p>
      <p><span class="glyphicon glyphicon-envelope"></span> ihavedomi@gmail.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Image of location/map -->
{{--<img src="/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%">--}}

<footer class="container-fluid text-center bg-grey">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>
    <h4><i>Stay connected with us</i></h4>
    <a href="#" target="_blank" data-toggle="tooltip" title="Like our Facebook page"><i class="fa fa-facebook fa-2x"></i></a>
    <a href="#" target="_blank"><i class="fa fa-instagram fa-2x text-danger" data-toggle="tooltip" title="Follow us on Instagram"></i></a>
    <a href="#" rel="publisher" target="_blank"><i class="fa fa-google-plus fa-2x text-danger" data-toggle="tooltip" title="Follow our Google+ page"></i></a>
    <a href="#" target="_blank"><i class="fa fa-twitter fa-2x" data-toggle="tooltip" title="Follow us on Twitter"></i></a>
  </p>
  <div class="col-sm-12 m-t-30">
    <span>Copyright © <a href="{{route('main')}}" class="text-maroon">{{config('app.name')}}</a></span> |
    <span>All Rights Reserved.</span>
  </div>
</footer>

</body>
</html>
