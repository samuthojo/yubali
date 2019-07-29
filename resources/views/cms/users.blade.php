@extends('cms.layouts.cms_layout')

@section('content')

<div class="card">
  
  <div class="card-header d-flex justify-content-between align-items-center">
    <div>Users</div>
    <div>
      <a role="button" 
        class="btn btn-pill btn-info"
        href="{{ route('users.create') }}">
        create
      </a>
    </div>
  </div>
  
  <div class="card-body">
    
    <div class="table-responsive">
      
      <table class="table table-hover" id="yubali-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{$user->firstname. " " .$user->lastname}}</td>
            <td>{{$user->roles()->first()->name}}</td>
            <td>{{$user->mobile}}</td>
            <td>{{$user->email}}</td>
            <td>
              <div class="btn-group">
                <a type="button" class="btn btn-pill btn-dark"
                  data-toggle="tooltip" title="view details"
                  href="{{route('users.edit', ['user'=>$user->id])}}">
                  Edit
                </a>
                <a type="button" class="btn btn-pill btn-warning btn-delete"
                  id="{{$user->id}}">
                  Delete
                </a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
    </div>
    
  </div>
  
</div>

@include('cms.modals.confirmation', [
  'method'=>'DELETE',
  'message'=>'You are about to delete this user!'
])

<script type="text/javascript">
$(function () {
  $(".btn-delete").on("click", function () {
    let user_id = $(this).attr("id")
    $("#acceptForm").attr("action", '/cms/users/' + user_id)
    $("#acceptRequest").modal({
      backdrop: 'static',
      keyboard: false
    })
  })
  $("#yubali-table").DataTable({
    iDisplayLength: 6,
    bLengthChange: false
  })
})
</script>

@endsection