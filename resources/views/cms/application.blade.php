@extends('cms.layouts.cms_layout')

@section('content')

<div class="card">
  
  <div class="card-header d-flex justify-content-between">
    {{--<a class="btn btn-pill btn-secondary" href="#"
      data-toggle="tooltip" title="Back">
      <i class="fa fa-arrow-left"></i>
    </a>--}}
    <div>Applicant Details</div>
    <div class="btn-group">
      <button 
        class="btn btn-warning btn-cancel"
        id="{{$application->id}}">
        Reject
      </button>
      <button 
        class="btn btn-brown btn-approve"
        id="{{$application->id}}">
        Approve
      </button>
    </div>
  </div>
  
  <div class="card-body">
    
    <div class="row">
      
      <div class="col-md-2">
        
        <img src="{{$application->avatar}}" alt="Applicant Picture"
          class="img-circle"
          style="width:100px; height: 100px;"><br><br>
        
        <div>Basata Certificate:</div>  
        <div>
          <a 
            href="{{route('applications.basataCertificate', ['application' => $application])}}" 
            target="_blank"
            class="btn btn-brown">
            View certificate
          </a>
        </div>
        
      </div>
      
      <div class="col-md-10">
        
        <div class="table-responsive">
          
          <table class="table table-striped"> 
            <tr>
              <th>Status: </th>
              <td class="{{($application->status === 'pending') ? 'text-danger' : 'text-success'}}">
                <strong>{{ucfirst($application->status)}}</strong>
              </td>
            </tr>
            <tr>
              <th>Applicant Name: </th>
              <td>{{fullName($application->firstname, $application->middlename, $application->lastname)}}</td>
            </tr>
            <tr>
              <th>Payment Method Used: </th>
              <td>
                <strong>{{ucfirst($application->payment_method)}}</strong>
              </td>
            </tr>
            <tr>
              <th>Confirmation Code: </th>
              <td>
                <strong>{{ucfirst($application->confirmation_code)}}</strong>
              </td>
            </tr>
            <tr>
              <th>Birth Date: </th>
              <td>{{nice_date($application->birthdate)}}</td>
            </tr>
            <tr>
              <th>Gender: </th>
              <td>{{ucfirst($application->gender)}}</td>
            </tr>
            <tr>
              <th>Specialization: </th>
              <td>{{ucfirst($application->specialization)}}</td>
            </tr>
            <tr>
              <th>Salvation: </th>
              <td>{{salvation_status($application->salvation_status)}}</td>
            </tr>
            <tr>
              <th>Denomination: </th>
              <td>{{ucfirst($application->denomination)}}</td>
            </tr>
            <tr>
              <th>Church: </th>
              <td>{{$application->church_name}}</td>
            </tr>
            <tr>
              <th>Church Location: </th>
              <td>{{$application->church_location}}</td>
            </tr>
            <tr>
              <th>Marital Status: </th>
              <td>{{ucfirst($application->marital_status)}}</td>
            </tr>
            <tr>
              <th>Children: </th>
              <td>{{$application->children_number}}</td>
            </tr>
            <tr>
              <th>Residence: </th>
              <td>{{$application->physical_address}}</td>
            </tr>
            <tr>
              <th>Mobile: </th>
              <td>{{$application->mobile}}</td>
            </tr>
            <tr>
              <th>Email: </th>
              <td>{{$application->email}}</td>
            </tr>
            <tr>
              <th>Biography: </th>
              <td>{{$application->biography}}</td>
            </tr>
          </table>
          
        </div>
        
      </div>
      
    </div>  
    
  </div>
  
</div>

@include('cms.modals.approve_application')
@include('cms.modals.cancel_application')

<script type="text/javascript">
$(function () {
  $(".btn-cancel").on("click", function() {
    let request_id = $(this).attr('id')
    $("#cancelForm").attr("action", '/cms/applications/' + request_id + '/disapprove')
    $("#cancelRequest").modal({
      backdrop: 'static',
      keyboard: false
    })
  })
  $("#cancelRequest").on("hide.bs.modal", function (ev) {
    $('#cancelTextarea').val("")
  })
  $(".btn-approve").on("click", function() {
    let request_id = $(this).attr('id')
    $("#approveForm").attr("action", '/cms/applications/' + request_id + '/approve')
    $("#approveRequest").modal({
      backdrop: 'static',
      keyboard: false
    })
  })
})  
</script>

@endsection