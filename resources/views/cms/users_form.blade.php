@extends('cms.layouts.cms_layout')

@section('content')

<div class="row">
  
  <div class="col-12">
    
    <div class="card">
      
      <div class="card-header">
        {{--<a class="btn btn-pill btn-secondary" href="{{route('users.index')}}"
          data-toggle="tooltip" firstname="Back">
          <i class="fa fa-arrow-left"></i>
        </a>--}}
        User Details
      </div>
      
      <div class="card-body">
        
        <form 
          @isset($user)
            {{'action='}}
            "{{route('users.update', ['user'=>$user->id])}}"
          @else
            {{'action='}}
            "{{route('users.store')}}"
          @endisset 
          method="post">
          @csrf
          @method(isset($user) ? 'PATCH' : 'POST')
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="firstname" style="font-weight: bold;">First Name:</label>
              <input type="text" name="firstname" value="{{old('firstname')}}"
                class="form-control" placeholder="First Name"  
                id="firstname">
            </div>
            <div class="col-md-6 form-group">
              <label for="lastname" style="font-weight: bold;">Last Name:</label>
              <input type="text" name="lastname" value="{{old('lastname')}}"
                class="form-control" placeholder="Last Name"  
                id="lastname">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="mobile" style="font-weight: bold;">Mobile:</label>
              <input type="text" name="mobile" value="{{old('mobile')}}"
                class="form-control" placeholder="Mobile"
                id="mobile">
            </div>
            <div class="col-md-6 form-group">
              <label for="email" style="font-weight: bold;">Email:</label>
              <input type="text" name="email" value="{{old('email')}}"
                class="form-control" placeholder="Email" 
                id="email">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="role_id" style="font-weight: bold;">Role:</label>
              <select class="form-control" name="role_id" id="role_id">
                <option value="" selected disabled>select</option>
                @foreach($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-brown float-sm-right">Save</button>
            </div>
          </div>
        </form>
        
      </div>
      
    </div>
    
  </div>
  
</div>

<script type="text/javascript">
  @isset($user)
  let user = {!! json_encode($user) !!}
  $("#firstname").val(user.firstname)
  $("#lastname").val(user.lastname)
  $("#mobile").val(user.mobile)
  $("#email").val(user.email)
  $("#role_id").val(user.role_id)
  @endisset
</script>

@endsection