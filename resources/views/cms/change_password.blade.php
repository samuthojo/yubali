@extends('cms.layouts.cms_layout')

@section('content')

<div class="card">
  
  <div class="card-header">
    Change Password
  </div>
  
  <div class="card-body">
    
    <form name="reset_password_form" id="reset_password_form"
      method="post" action="{{route('password.request')}}">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="current_password" style="font-weight: bold;">Current Password:</label>
        <input type="password" id="current_password"
          name="current_password" class="form-control"
          placeholder="current password"
          value="{{ old('current_password') }}">
      </div>

      <div class="form-group">
        <label for="new_password" style="font-weight: bold;">New Password:</label>
        <input type="password" id="new_password" name="password"
          class="form-control" placeholder="new password">
      </div>

      <div class="form-group">
        <label for="password_confirmation" style="font-weight: bold;">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
          class="form-control" placeholder="confirm password">
      </div>

      <div class="form-group">
        <button class="btn btn-pill btn-brown float-right" type="submit">
          Submit
        </button>
      </div>

    </form>
    
  </div>
  
</div>

@endsection