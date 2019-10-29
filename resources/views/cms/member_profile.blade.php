@extends('cms.layouts.cms_layout')

@section('content')

<div class="alert alert-success alert-dismissible d-none" id="ajaxSuccess">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> <br>{{'Picture Updated Successfully!'}}
</div>

<div class="alert alert-danger alert-dismissible d-none" id="ajaxFailure">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> <br>{{'Wrong file format or picture too large!'}}
</div>
  
<h3>My Details</h3>
<hr>

<div class="container">
  
  <div class="row">
    
    <div class="col-md-10">
      
      <form 
        action="{{route('members.update', ['member' => $member->id])}}" method="post">
        @csrf
        @method('PATCH')
       <div class="row">
         <div class="form-group col-md-4">
           <label style="font-weight: bold;" for="fname">First Name:</label>
           <input type="text" name="firstname" class="form-control" id="fname"
            placeholder="eg. Erick" value="{{ old('firstname') }}">
         </div>
         <div class="form-group col-md-4">
           <label style="font-weight: bold;" for="mname">Middle Name:</label>
           <input type="text" name="middlename" class="form-control" id="mname"
            placeholder="" value="{{ old('middlename') }}">
         </div>
         <div class="form-group col-md-4">
           <label style="font-weight: bold;" for="mname">Last Name:</label>
           <input type="text" name="lastname" class="form-control" id="lname"
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
       <button type="submit" class="btn btn-brown mb-2 float-right">Save</button>
      </form>
      
    </div>
    
    <div class="col-md-2 d-flex flex-column">
      
      <div class="form-group" style="position: relative;">
        <img src="{{$member->avatar}}" alt="Profile Picture"
          class="img-circle" style="width: 100px; height: 100px;">
        <i class="fa fa-spinner fa-spin fa-2x text-light" aria-hidden="true"
          style="position: absolute; left: 35px; top: 35px;"></i>
      </div>
      <form style="padding: 0 10px;">
        <button type="button" class="btn btn-brown" id="fileTrigger">Change</button>
        <input type="file" name="picture" id="picturePicker" class="d-none">
      </form>
      
    </div>
    
  </div>
  
</div>

<script type="text/javascript">
$(function () {
  $("#dob").val("{{$member->birthdate}}")
  $("#denomination").val("{{$member->denomination}}")
  $("#marital_status").val("{{$member->marital_status}}")
  $("#salvation_status").val("{{$member->salvation_status}}")
  $("#specialization").val("{{$member->specialization}}")
  $("#gender").val("{{$member->gender}}")
  $("#biography").val("{{$member->biography}}")
  $("#church_name").val("{{$member->church_name}}")
  $("#church_location").val("{{$member->church_location}}")
  $("#children_number").val("{{$member->children_number}}")
  $("#residence").val("{{$member->physical_address}}")
  $("#fname").val("{{$member->firstname}}")
  $("#mname").val("{{$member->middlename}}")
  $("#lname").val("{{$member->lastname}}")
  $("#mobile").val("{{$member->mobile}}")
  $("#email").val("{{$member->email}}")
  
  // Hide the spinner
  $(".fa-spinner").hide()
  
  // Hide the messages
  $("#ajaxSuccess").hide()
  $("#ajaxFailure").hide()
  
  // Update Profile Picture
  $("#fileTrigger").on("click", function () {
    $("#picturePicker").click()
  })
  $("#picturePicker").on("change", function (ev) {
    $(".fa-spinner").show()
    $(".img-circle").css("opacity", 0.6)
    let file = ev.target.files[0]
    let member_id = {{$member->id}}
    let formData = new FormData()
    formData.append('picture', file)
    formData.append('_method', 'PUT')
    axios.post('/cms/members/' + member_id + '/picture', formData)
        .then(response => {
          $(".fa-spinner").hide()
          $(".img-circle").attr("src", response.data.member.avatar)
          $(".img-circle").css("opacity", 1)
          $("#ajaxSuccess").show()
        }).catch(error => {
          $(".fa-spinner").hide()
          $(".img-circle").css("opacity", 1)
          $("#ajaxFailure").show()
        })
  })
})  
</script>

@endsection