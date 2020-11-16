@extends('layout.default')


@section('content')


<div style="margin-top: 50px;"></div>
<div class="container">
 <div class="row">
  <div class="col-md-12 m-auto">
   <div class="card">
    <div class="card-header text-center">
     <strong class="h3 text-info">Student Details</strong>
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
        <th scope="col">Name</th>
        <th scope="col">Father</th>
        <th scope="col">Class</th>
        <th scope="col">Phone</th>
        <th scope="col">Image</th>
        <th scope="col">Email</th>
        <th scope="col" colspan="2">Action</th>
      </tr>
     </thead>
     <tbody>
      @foreach ($students as $data)
      <tr class="text-center">
        <td>{{$data->id}}</td>
        <td>{{$data->sname}}</td>
        <td>{{$data->fname}}</td>
        <td>{{$data->class}}</td>
        <td>{{$data->phone}}</td>
        <td>
         <img src="{{asset('images')}}/{{$data->image}}" style="max-width: 100px;"/>
        </td>
        <td>{{$data->email}}</td>
        <td colspan="2">
        <a href="/student/edit/{{$data->id}}" class="btn btn-sm btn-warning">Edit</a>
         <a href="/student/destroy/{{$data->id}}" class="btn btn-sm btn-danger">Delete</a>
        </td>
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