@extends('layout.default')


@section('content')


<div style="margin-top: 50px;"></div>
<div class="container">
 <div class="row">
  <div class="col-md-11 m-auto">
   <div class="card">
    <div class="card-header text-center">
     <strong class="h3 text-info">Branch Details</strong>
    </div>

    <div class="card-body">
	 
      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>{{Session::get('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

    <table id="example" class="table table-striped table-bordered" style="width:100%">
     <thead>
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col">Branch Short Name</th>
        <th scope="col">Branch Full Name</th>
      </tr>
     </thead>
     <tbody>
      @foreach ($brances as $data)
      <tr class="text-center">
        <td>{{$data->id}}</td>
        <td>{{$data->bsort}}</td>
        <td>{{$data->bfull}}</td>
      </tr>
          
      @endforeach
     </tbody>
 </table>
    </div>
   </div>
  </div>
 </div>



</div>
@endsection