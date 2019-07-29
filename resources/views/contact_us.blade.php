@extends('layouts.front-end')

@section('content')
<div class="">

  <div class="col-xs-12">
    
    <h5 style="">
      If you have more questions about YUBALI FOUNDATION or 
      its activities please drop your details under the form below:
      <hr>
    </h5>
    
    <form method="post" action="">
      @csrf
     <div class="form-group">
       <label style="font-weight: bold;" for="name">Name:</label>
       <input type="text" name="full_name" class="form-control" id="name"
        placeholder="eg. James Magike" value="{{ old('full_name') }}"
        required>
     </div>
     <div class="form-group">
       <label style="font-weight: bold" for="mobile">Phone number:</label>
       <input type="text" name="mobile" class="form-control" id="mobile"
        placeholder="eg. 0712838779" value="{{ old('mobile') }}"
        required>
     </div>
     <div class="form-group">
       <label style="font-weight: bold" for="email">Email address:</label>
       <input type="text" name="email" class="form-control" id="email"
        placeholder="eg. james12@hotmail.com" value="{{ old('email') }}"
        required>
     </div>
     <div class="form-group">
       <label style="font-weight: bold;" for="content">How can we help you:</label>
       <textarea name="content" class="form-control" id="content" rows="4"
         placeholder="Tell us ..." required></textarea>
     </div>
     <button type="submit" class="btn btn-brown mb-2 float-right">Submit</button>
    </form> 
  </div>
  
</div>
@endsection