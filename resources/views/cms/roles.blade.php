@extends('cms.layouts.cms_layout')

@section('content')

<div class="card">
  
  <div class="card-header">
    Roles
  </div>
  
  <div class="card-body">
    
    <div class="table-responsive">
      
      <table class="table table-hover" id="yubali-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($roles as $role)
          <tr>
            <td>{{$role->name}}</td>
            <td>
              <div class="btn-group">
                <a type="button" class="btn btn-pill btn-dark"
                  data-toggle="tooltip" title="view details"
                  href="{{route('roles.edit', ['role'=>$role->id])}}">
                  Edit
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
$("#yubali-table").DataTable({
  iDisplayLength: 6,
  bLengthChange: false
})
</script>

@endsection