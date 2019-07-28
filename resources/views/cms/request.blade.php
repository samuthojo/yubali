@extends('cms.layouts.cms_layout')

@section('content')

<div class="card">
  
  <div class="card-header">
    <a class="btn btn-pill btn-secondary" href="{{route('members.requests', ['status'=>session('status')])}}"
      data-toggle="tooltip" title="Back">
      <i class="fa fa-arrow-left"></i>
    </a>
    Request Details
  </div>
  
  <div class="card-body">
    
    <div class="table-responsive">
      
      <table class="table table-striped"> 
        <tr>
          <th>Status: </th>
          <td class="{{($request->status === 'pending') ? 'text-danger' : 'text-success'}}">
            <strong>{{ucfirst($request->status)}}</strong>
          </td>
        </tr>
        <tr>
          <th>Category: </th>
          <td>{{service_category($request->service_category)}}</td>
        </tr>
        <tr>
          <th>Denomination: </th>
          <td>{{$request->denomination}}</td>
        </tr>
        <tr>
          <th>Start Date: </th>
          <td>{{nice_date($request->start_date)}}</td>
        </tr>
        <tr>
          <th>End Date: </th>
          <td>{{nice_date($request->end_date)}}</td>
        </tr>
        <tr>
          <th>Region: </th>
          <td>{{$request->region}}</td>
        </tr>
        <tr>
          <th>District: </th>
          <td>{{$request->district}}</td>
        </tr>
        <tr>
          <th>Place: </th>
          <td>{{$request->place}}</td>
        </tr>
        <tr>
          <th>Client Name: </th>
          <td>{{$request->name}}</td>
        </tr>
        <tr>
          <th>Contact Person: </th>
          <td>{{$request->contact_person}}</td>
        </tr>
        <tr>
          <th>Mobile: </th>
          <td>{{$request->mobile}}</td>
        </tr>
        <tr>
          <th>Email: </th>
          <td>{{$request->email}}</td>
        </tr>
      </table>
      
    </div>  
    
  </div>
  
</div>

@endsection