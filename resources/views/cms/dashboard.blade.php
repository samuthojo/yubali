@extends('cms.layouts.cms_layout')

@section('content')

<div class="container">
  
  <div class="row justify-content-center">
  
    <div class="col-md-4">
      
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">Singers</h5>
          <p class="card-text text-center" style="font-size: 1.3rem;">
            {{ sprintf('%s', number_format($count['singers'])) }}
          </p>
        </div>
      </div>
      
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">Instrumentalists</h5>
          <p class="card-text text-center" style="font-size: 1.3rem;">
            {{ sprintf('%s', number_format($count['instrumentalists'])) }}
          </p>
        </div>
      </div>
      
    </div>
    
  </div>
  
</div>

@endsection