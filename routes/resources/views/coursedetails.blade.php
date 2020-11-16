@extends('layout.default')


@section('content')


<div style="margin-top: 50px;"></div>
<div class="container">
 <div class="row">
  <div class="col-md-11 m-auto">
   <div class="card">
    <div class="card-header text-center">
     <strong class="h3 text-info">Course Details</strong>
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
       <th scope="col">Branch Id</th>
        <th scope="col">Branch Name</th>
        <th scope="col">course Id</th>
        <th scope="col">Course Name</th>
      </tr>
     </thead>
     <tbody>
      @foreach ($course as $data)
      <tr class="text-center">
       <td>{{$data->branch_id}}</td>
        <td>{{$data->bfull}}</td>
        <td>{{$data->id}}</td>
        <td>{{$data->cname}}</td>
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