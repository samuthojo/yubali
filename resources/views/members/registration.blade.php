@extends('layouts.front-end')

@section('content')
  
<div class="">
  
  <h3>Membership Application Form</h3>
  <hr>
  
  <form enctype="multipart/form-data" action="{{route('applications.store')}}" method="post">
    @csrf
   <div class="row">
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="fname">First Name:</label>
       <input type="text" name="firstname" class="form-control" id="fname"
        placeholder="eg. Erick" value="{{ old('firstname') }}">
     </div>
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="mname">Middle Name:</label>
       <input type="text" name="middlename" class="form-control" id="mname"
        placeholder="eg. Gabriel" value="{{ old('middlename') }}">
     </div>
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="mname">Last Name:</label>
       <input type="text" name="lastname" class="form-control" id="mname"
        placeholder="eg. Ndimbo" value="{{ old('lastname') }}">
     </div>
   </div>
   <div class="row">
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="dob">Date Of Birth:</label>
       <input type="date" name="birthdate" class="form-control" id="dob"
         value="{{ old('birthdate') }}">
     </div>
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="gender">Gender:</label>
       <select name="gender" class="form-control" id="gender">
         <option selected disabled>select</option>
         <option value="male">Male</option>
         <option value="female">Female</option>
       </select>
     </div> 
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="specialization">Specialization:</label>
       <select name="specialization" class="form-control" id="specialization">
         <option selected disabled>select</option>
         <option value="singer">Singer</option>
         <option value="instrumentalist">Instrumentalist</option>
       </select>
     </div> 
   </div>
   <div class="row">
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="marital_status">Marital Status:</label>
       <select name="marital_status" class="form-control" id="marital_status">
         <option selected disabled>select</option>
         <option value="single">Single</option>
         <option value="married">Married</option>
         <option value="divorced">Divorced</option>
         <option value="separated">Separated</option>
       </select>
     </div> 
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="children_number">
        Number Of Children:</label>
       <input type="number" name="children_number" placeholder="eg. 2"
          class="form-control" id="children_number"
        value="{{ old('children_number') }}">
     </div>
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="residence">Residence/ Physical Address:</label>
       <input type="text" name="physical_address" class="form-control" id="residence"
        placeholder="eg. Tabata Segerea, Dar es Salaam" value="{{ old('physical_address') }}">
     </div>
   </div>
   <div class="row">
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="mobile">Mobile Number:</label>
       <input type="text" name="mobile" class="form-control" id="mobile"
        placeholder="eg. 0713443944" value="{{ old('mobile') }}">
     </div>
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="email">Email:</label>
       <input type="text" name="email" class="form-control" id="email"
        placeholder="eg. jas@gmail.com" value="{{ old('email') }}">
     </div>
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="salvation_status">Salvation Status:</label>
       <select name="salvation_status" class="form-control" id="salvation_status">
         <option selected disabled>select</option>
         <option value="saved">Saved</option>
         <option value="not_saved">Not Saved</option>
       </select>
     </div> 
   </div>
   <div class="row">
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="denomination">Denomination:</label>
       <select name="denomination" class="form-control" id="denomination">
         <option selected disabled>select</option>
         <option value="adventist">Adventist</option>
         <option value="catholic">Catholic</option>
         <option value="pentecostal">Pentecostal</option>
         <option value="protestant">Protestant</option>
       </select>
     </div> 
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="church_name">Name Of Church:</label>
       <input type="text" name="church_name" class="form-control" id="church_name"
        placeholder="eg. Cornerstone Church" value="{{ old('church_name') }}">
     </div>
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="church_location">Church Location:</label>
       <input type="text" name="church_location" class="form-control" id="church_location"
        placeholder="eg. Mbezi Beach, Dar es Salaam" value="{{ old('church_location') }}">
     </div>
   </div>
   <div class="row">
     <div class="form-group col-12">
       <label style="font-weight: bold;" for="biography">Biography:</label>
       <textarea name="biography" class="form-control" id="biography"
        placeholder="Short Biography" rows="3"></textarea>
     </div>
   </div>
   <div class="row">
     <div class="form-group col-12">
       <label style="font-weight: bold;" for="picture">Profile Picture:</label><br>
       <input type="file" name="picture" id="picture" required>
     </div>
   </div>
   <button type="submit" class="btn btn-brown mb-2 float-right">Submit</button>
  </form>
  
</div>

<script type="text/javascript">
$(function () {
  $("#denomination").val("{{old('denomination')}}")
  $("#marital_status").val("{{old('marital_status')}}")
  $("#salvation_status").val("{{old('salvation_status')}}")
  $("#specialization").val("{{old('specialization')}}")
  $("#gender").val("{{old('gender')}}")
  $("#biography").val("{{old('biography')}}")
})  
</script>

@endsection