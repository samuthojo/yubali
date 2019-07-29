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
            <th>Birth Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($members as $member)
          <tr>
            <td>{{fullName($member->firstname, $member->middlename, $member->lastname)}}</td>
            <td>{{ucfirst($member->specialization)}}</td>
            <td>{{ucfirst($member->denomination)}}</td>
            <td>{{nice_date($member->birth_date)}}</td>
            <td>
              <div class="btn-group">
                <a type="button" class="btn btn-pill btn-dark"
                  href="{{route('members.cmsShow', ['member'=>$member->id])}}">
                  View
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

<script type="text/javascript">
$(function () {
  $("#yubali-table").DataTable({
    iDisplayLength: 6,
    bLengthChange: false
  })
})
</script>

@endsection