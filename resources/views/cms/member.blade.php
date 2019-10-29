@extends('cms.layouts.cms_layout')

@section('content')

<div class="card">
  
  <div class="card-header d-flex justify-content-between">
    {{--<a class="btn btn-pill btn-secondary" href="#"
      data-toggle="tooltip" title="Back">
      <i class="fa fa-arrow-left"></i>
    </a>--}}
    <div>Member Details</div>
  </div>
  
  <div class="card-body">
    
    <div class="row">
      
      <div class="col-md-2 mb-2">
        
        <img src="{{$member->avatar}}" alt="Applicant Picture"
          class="img-circle"
          style="width:100px; height: 100px;"><br><br>
        
        <div>Basata Certificate:</div>
        <div>
          <a href="{{route('members.basataCertificate', ['member' => $member])}}" 
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
              <th>Name: </th>
              <td>{{fullName($member->firstname, $member->middlename, $member->lastname)}}</td>
            </tr>
            <tr>
              <th>Payment Method Used: </th>
              <td>
                <strong>{{ucfirst($member->payment_method)}}</strong>
              </td>
            </tr>
            <tr>
              <th>Confirmation Code: </th>
              <td>
                <strong>{{ucfirst($member->confirmation_code)}}</strong>
              </td>
            </tr>
            <tr>
              <th>Birth Date: </th>
              <td>{{nice_date($member->birthdate)}}</td>
            </tr>
            <tr>
              <th>Gender: </th>
              <td>{{ucfirst($member->gender)}}</td>
            </tr>
            <tr>
              <th>Specialization: </th>
              <td>{{ucfirst($member->specialization)}}</td>
            </tr>
            <tr>
              <th>Salvation: </th>
              <td>{{salvation_status($member->salvation_status)}}</td>
            </tr>
            <tr>
              <th>Denomination: </th>
              <td>{{ucfirst($member->denomination)}}</td>
            </tr>
            <tr>
              <th>Church: </th>
              <td>{{$member->church_name}}</td>
            </tr>
            <tr>
              <th>Church Location: </th>
              <td>{{$member->church_location}}</td>
            </tr>
            <tr>
              <th>Marital Status: </th>
              <td>{{ucfirst($member->marital_status)}}</td>
            </tr>
            <tr>
              <th>Children: </th>
              <td>{{$member->children_number}}</td>
            </tr>
            <tr>
              <th>Residence: </th>
              <td>{{$member->physical_address}}</td>
            </tr>
            <tr>
              <th>Mobile: </th>
              <td>{{$member->mobile}}</td>
            </tr>
            <tr>
              <th>Email: </th>
              <td>{{$member->email}}</td>
            </tr>
            <tr>
              <th>Biography: </th>
              <td>{{$member->biography}}</td>
            </tr>
          </table>
          
        </div> 
        
      </div>
      
    </div>
    
  </div>
  
</div>

@endsection