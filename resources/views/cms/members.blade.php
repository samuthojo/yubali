@extends('cms.layouts.cms_layout')

@section('content')

<div class="card">
  
  <div class="card-header">
    Members
  </div>
  
  <div class="card-body">
    
    <div class="table-responsive">
      
      <table class="table table-hover" id="yubali-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Specialization</th>
            <th>Denomination</th>
            <th>Age</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($members as $member)
          <tr>
            <td>{{fullName($member->firstname, $member->middlename, $member->lastname)}}</td>
            <td>{{ucfirst($member->specialization)}}</td>
            <td>{{ucfirst($member->denomination)}}</td>
            <td>{{age($member->birthdate)}}</td>
            <td>
              <div class="btn-group">
                <a type="button" class="btn btn-pill btn-dark"
                  href="{{route('members.cmsShow', ['member'=>$member->id])}}">
                  View
                </a>
                <a type="button" class="btn btn-pill btn-warning btn-delete"
                  id="{{$member->id}}">
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
  'message'=>'You are about to delete this member!'
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