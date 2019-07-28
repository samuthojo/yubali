@extends('cms.layouts.cms_layout')

@section('content')

<div class="card">
  
  <div class="card-header">
    Role Details
  </div>
  
  <div class="card-body">
    
    <form action="{{route('roles.update',['role'=>$role->id])}}" method="post">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label style="font-weight: bold;" for="name">Name:</label>
        <input type="text" name="name" value="{{old('name')}}"
          class="form-control" placeholder="Name" id="name">
      </div>
      <div class="form-group">
        <label style="font-weight: bold;" for="description">Description:</label>
        <textarea name="description" value="{{old('description')}}"
          class="form-control" id="description"></textarea>
      </div>
      <div class="">
        <button type="submit" class="btn btn-brown float-sm-right">Save</button>
      </div>
    </form>
    
  </div>
  
</div>

<script type="text/javascript">
  let role = {!! json_encode($role) !!}
  $("#name").val(role.name)
  $("#description").val(role.description)
</script>

@endsection