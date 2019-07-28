@extends('cms.layouts.cms_layout')

@section('content')

<div class="row d-flex justify-content-center">
  
  <div class="col-md-8">
    
    <div class="card">
      
      <div class="card-header">
        {{--<a class="btn btn-pill btn-secondary" href="{{route('events.list')}}"
          data-toggle="tooltip" title="Back">
          <i class="fa fa-arrow-left"></i>
        </a>--}}
        Event Details
      </div>
      
      <div class="card-body">
        
        <form action="{{route('events.update', ['event'=>$event->id])}}" method="post">
          @csrf
          @method('PATCH')
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="title" style="font-weight: bold;">Title:</label>
              <input type="text" name="title" value="{{old('title')}}"
                class="form-control"  
                id="title">
            </div>
            <div class="col-md-6 form-group">
              <label for="venue" style="font-weight: bold;">Venue:</label>
              <input type="text" name="venue" value="{{old('venue')}}"
                class="form-control"  
                id="venue">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="starts_at" style="font-weight: bold;">Starts At:</label>
              <input type="time" name="starts_at" value="{{old('starts_at')}}"
                class="form-control"  
                id="starts_at">
            </div>
            <div class="col-md-6 form-group">
              <label for="ends_at" style="font-weight: bold;">Ends At:</label>
              <input type="time" name="ends_at" value="{{old('ends_at')}}"
                class="form-control"  
                id="ends_at">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="start_date" style="font-weight: bold;">Start Date:</label>
              <input type="date" name="start_date" value="{{old('start_date')}}"
                class="form-control"  
                id="start_date">
            </div>
            <div class="col-md-6 form-group">
              <label for="end_date" style="font-weight: bold;">End Date:</label>
              <input type="date" name="end_date" value="{{old('end_date')}}"
                class="form-control"  
                id="end_date">
            </div>
          </div>
          <div class="row">
            <div class="col-12 form-group">
              <label for="description" style="font-weight: bold;">Description:</label>
              <textarea name="description" value="{{old('description')}}"
                class="form-control" rows="3"     
                id="description"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-brown float-sm-right">Save</button>
            </div>
          </div>
        </form>
        
      </div>
      
    </div>
    
  </div>
  
</div>

<script type="text/javascript">
  let event = {!! json_encode($event) !!}
  $("#title").val(event.title)
  $("#venue").val(event.venue)
  $("#start_date").val(event.start_date)
  $("#starts_at").val(event.starts_at)
  $("#end_date").val(event.end_date)
  $("#ends_at").val(event.ends_at)
  $("#description").val(event.description)
</script>

@endsection