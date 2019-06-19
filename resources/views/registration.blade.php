@extends('layouts.front-end')

@section('content')
  
<div class="">
  
  <h3>Membership Application Form</h3>
  <hr>
  
  <form class="" action="" method="post">
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
       <input type="text" name="birthdate" class="form-control" id="dob"
        placeholder="eg. 22/03/1990" value="{{ old('birthdate') }}">
     </div>
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="gender">Gender:</label>
       <select name="gender" class="form-control" id="gender">
         <option selected disabled>select</option>
         <option>Male</option>
         <option>Female</option>
       </select>
     </div> 
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="applicant_type">Applicant Type:</label>
       <select name="applicant_type" class="form-control" id="applicant_type">
         <option selected disabled>select</option>
         <option>Singer</option>
         <option>Instrumentalist</option>
       </select>
     </div> 
   </div>
   <div class="row">
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="marital_status">Marital Status:</label>
       <select name="marital_status" class="form-control" id="marital_status">
         <option selected disabled>select</option>
         <option>Single</option>
         <option>Married</option>
         <option>Divorced</option>
         <option>Separated</option>
       </select>
     </div> 
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="children_number">
        Number Of Children:</label>
       <input type="number" name="children_number" 
          class="form-control" id="children_number"
        value="{{ old('children_number') }}">
     </div>
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="dob">Residency/ Physical Address:</label>
       <input type="text" name="birthdate" class="form-control" id="dob"
        placeholder="eg. 22/03/1990" value="{{ old('birthdate') }}">
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
         <option>Saved</option>
         <option>Not Saved</option>
       </select>
     </div> 
   </div>
   <div class="row">
     <div class="form-group col-md-4">
       <label style="font-weight: bold;" for="denomination">Denomination:</label>
       <select name="denomination" class="form-control" id="denomination">
         <option selected disabled>select</option>
         <option>Adventist</option>
         <option>Catholic</option>
         <option>Pentecostal</option>
         <option>Protestant</option>
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
   <button type="submit" class="btn btn-success mb-2 float-right">Submit</button>
  </form>
  
</div>

@endsection