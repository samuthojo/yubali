@extends('cms.layouts.cms_layout')

@section('content')

<div class="card">
  
  <div class="card-header">
    Applications
  </div>
  
  <div class="card-body">
    
    <div class="table-responsive">
      
      <table class="table table-hover" id="yubali-table">
        <thead>
          <tr>
            <th>Applicant Name</th>
            <th>Specialization</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($applications as $application)
          <tr>
            <td>{{fullName($application->firstname, $application->middlename, $application->lastname)}}</td>
            <td>{{ucfirst($application->specialization)}}</td>
            <td>
              <div class="btn-group">
                <a type="button" class="btn btn-pill btn-dark"
                  href="{{route('applications.show', ['application'=>$application->id])}}">
                  View
                </a>
                {{--@if($application->status === 'pending')
                <button type="button" class="btn btn-pill btn-warning btn-decline"
                  id="{{$application->id}}">
                  Decline
                </button>
                <button type="button" class="btn btn-pill btn-success btn-accept"
                  id="{{$application->id}}">
                  Approve
                </button>
                @endif--}}
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