@extends('layouts.front-end')

@section('content')

<h3>Please Fill In The Form Below To Book {{fullName($member->firstname,$member->middlename,$member->lastname)}}</h3>
<hr>

<form action="{{route('members.book', ['member' => $member->id])}}" method="post">
  @csrf
 <div class="row">
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="service_category">Service Category:</label>
     <select name="service_category" class="form-control" id="service_category">
       <option {{ old('service_category') ? '' : 'selected' }} disabled>select</option>
       <option value="concert" {{ (old('service_category') === 'concert') ? 'selected' : '' }}>Concert</option>
       <option value="church_service" {{ (old('service_category') === 'church_service') ? 'selected' : '' }}>Church Service</option>
       <option value="crusade" {{ (old('service_category') === 'crusade') ? 'selected' : '' }}>Crusade</option>
       <option value="seminar" {{ (old('service_category') === 'seminar') ? 'selected' : '' }}>Seminar</option>
       <option value="others" {{ (old('service_category') === 'others') ? 'selected' : '' }}>Others</option>
     </select>
   </div> 
   <div class="form-group col-md-4" id="others-div">
     <label style="font-weight: bold;" for="name">Please Specify:</label>
     <input type="text" name="others" class="form-control" id="others"
      placeholder="Specify" value="{{ old('others') }}">
   </div>
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="denomination">Denomination:</label>
     <select name="denomination" class="form-control" id="denomination">
       <option {{ old('denomination') ? '' : 'selected' }} disabled>select</option>
       <option value="adventist" {{ (old('denomination') === 'adventist') ? 'selected' : '' }}>Adventist</option>
       <option value="catholic" {{ (old('denomination') === 'catholic') ? 'selected' : '' }}>Catholic</option>
       <option value="pentecostal" {{ (old('denomination') === 'pentecostal') ? 'selected' : '' }}>Pentecostal</option>
       <option value="protestant" {{ (old('denomination') === 'protestant') ? 'selected' : '' }}>Protestant</option>
     </select>
   </div>
 </div>
 <div class="row">
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="start_date">Start Date:</label>
     <input type="date" name="start_date" class="form-control" id="start_date"
      placeholder="Start Date" value="{{ old('start_date') }}">
   </div>
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="end_date">End Date:</label>
     <input type="date" name="end_date" class="form-control" id="end_date"
      placeholder="End Date" value="{{ old('end_date') }}">
   </div>
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="region">Region:</label>
     <input type="text" name="region" class="form-control" id="region"
      placeholder="eg. Dar es Salaam" value="{{ old('region') }}">
   </div>
 </div> 
 <div class="row">
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
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="name">Name:</label>
     <input type="text" name="name" class="form-control" id="name"
      placeholder="Your Full Name" value="{{ old('name') }}">
   </div>
 </div>
 <div class="row">
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="contact_person">Contact Person:</label>
     <input type="text" name="contact_person" class="form-control" id="contact_person"
      placeholder="Full Name" value="{{ old('contact_person') }}">
   </div>
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="mobile">Mobile Number:</label>
     <input type="text" name="mobile" class="form-control" id="mobile"
      placeholder="eg. 0756 777 888" value="{{ old('mobile') }}">
   </div>
   <div class="form-group col-md-4">
     <label style="font-weight: bold;" for="email">Email:</label>
     <input type="text" name="email" class="form-control" id="email"
      placeholder="eg. dasem@hotmail.com" value="{{ old('email') }}">
   </div>
 </div>
 <button type="submit" class="btn btn-brown mb-2 float-right">Submit</button>
</form>

<script type="text/javascript">
  if ($("#service_category").val() !== 'others') {
    $("#others-div").hide()
  } 
  $("#service_category").on('change', function(ev) {
    if (ev.target.value === 'others') {
      $("#others-div").show()
    } else {
      $("#others-div").hide()
    }
  })
</script>
    
@endsection