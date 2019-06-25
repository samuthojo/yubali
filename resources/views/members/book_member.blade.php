@extends('layouts.front-end')

@section('content')

<h3>Please Fill In The Form Below To Book {{fullName($member->firstname,$member->middlename,$member->lastname)}}</h3>
<hr>

<form class="" action="" method="post">
  @csrf
 <div class="row">
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="service_category">Service Category:</label>
     <select name="service_category" class="form-control" id="service_category">
       <option selected disabled>select</option>
       <option>Concert</option>
       <option>Church Service</option>
       <option>Crusade</option>
       <option>Seminar</option>
       <option>Others</option>
     </select>
   </div> 
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="name">Name:</label>
     <input type="text" name="name" class="form-control" id="name"
      placeholder="Your Full Name" value="{{ old('name') }}">
   </div>
 </div>
 <div class="row">
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="region">Region:</label>
     <input type="text" name="region" class="form-control" id="region"
      placeholder="eg. Dar es Salaam" value="{{ old('region') }}">
   </div>
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="district">District:</label>
     <input type="text" name="district" class="form-control" id="district"
      placeholder="eg. Temeke" value="{{ old('district') }}">
   </div>
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="place">Place:</label>
     <input type="text" name="place" class="form-control" id="place"
      placeholder="eg. Kigamboni" value="{{ old('place') }}">
   </div>
 </div>
 <div class="row">
   <div class="form-group col-12">
     <label style="font-weight: bold;" for="denomination">Denomination:</label>
     <select name="denomination" class="form-control" id="denomination">
       <option selected disabled>select</option>
       <option>Adventist</option>
       <option>Catholic</option>
       <option>Pentecostal</option>
       <option>Protestant</option>
     </select>
   </div>
 </div> 
 <div class="row">
   <div class="form-group col-md-6">
     <label style="font-weight: bold;" for="contact_person">Contact Person:</label>
     <input type="text" name="contact_person" class="form-control" id="contact_person"
      placeholder="Full Name" value="{{ old('contact_person') }}">
   </div>
   <div class="form-group col-md-6">
     <label style="font-weight: bold;" for="mobile_number">Mobile Number:</label>
     <input type="text" name="mobile_number" class="form-control" id="mobile_number"
      placeholder="eg. 0756 777 888" value="{{ old('mobile_number') }}">
   </div>
 </div>
 <div class="row">
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="start_date">Start Date:</label>
     <input type="text" name="start_date" class="form-control" id="start_date"
      placeholder="Start Date" value="{{ old('start_date') }}">
   </div>
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="end_date">End Date:</label>
     <input type="text" name="end_date" class="form-control" id="end_date"
      placeholder="End Date" value="{{ old('end_date') }}">
   </div>
 </div>
 <button type="submit" class="btn btn-brown mb-2 float-right">Submit</button>
</form>
    
@endsection