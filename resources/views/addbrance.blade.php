@extends('layout.default')

@section('content')

<div style="margin-top: 50px;"></div>
<div class="container">
 <div class="row">
  <div class="col-md-7 m-auto">
   <div class="card">
    <div class="card-header text-center">
     <strong class="h3 text-info">Registration A Brance</strong>
    </div>

    <div class="card-body">
	 
      @if(Session::has('insert-message'))
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>{{Session::get('insert-message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

     <form method="POST" action="{{ url('/branch/store') }}">
       @csrf
      <div class="form-group row">
        <label for="bsort" class="text-info h4 col-sm-4 col-form-label">Branch Short Name</label>
        <div class="col-sm-8">
          <input name="bsort" type="text" class="form-control @error('bsort') is-invalid @enderror" id="bsort" placeholder="Branch Short Name" />
          @error('bsort')
           <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="bfull" class="text-info h4 col-sm-4 col-form-label">Branch Full Name</label>
        <div class="col-sm-8">
          <input name="bfull" type="text" class="form-control @error('bfull') is-invalid @enderror" id="bfull" placeholder="Branch Full Name" />
          @error('bfull')
           <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
          <button type="submit" class="btn btn-info form-control">Sign in</button>
      </div>
     </form>
    </div>
   </div>
  </div>
 </div>
</div>

@endsection