@extends('layout.default')

@section('content')

<div style="margin-top: 50px;"></div>
<div class="container">
 <div class="row">
  <div class="col-md-7 m-auto">
   <div class="card">
    <div class="card-header text-center">
     <strong class="h3 text-info">Edit Student Information</strong>
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
     <form method="POST" action="{{ url('/student/update/'.$student->id) }}" id="sregisterform" enctype="multipart/form-data">
       @csrf
      <div class="form-group row">
        <label for="sname" class="col-sm-2 col-form-label text-info h5">Name</label>
        <div class="col-sm-10">
          <input value="{{$student->sname}}" name="sname" type="text" class="form-control @error('sname') is-invalid @enderror" id="sname" placeholder="Student Name" />
          
          @error('sname')
           <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="fname" class="col-sm-2 col-form-label text-info h5">Father</label>
        <div class="col-sm-10">
          <input value="{{$student->fname}}"  name="fname" type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" placeholder="Father Name" />
          @error('fname')
           <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="class" class="col-sm-2 col-form-label text-info h5">Class</label>
        <div class="col-sm-10">
          <input value="{{$student->class}}"  name="class" type="text" class="form-control @error('class') is-invalid @enderror" id="class" placeholder="Class Name" />
          @error('class')
           <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label text-info h5">Phone</label>
        <div class="col-sm-10">
          <input value="{{$student->phone}}" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phonr No" />
          @error('phone')
           <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label text-info h5">Email</label>
        <div class="col-sm-10">
          <input value="{{$student->email}}"  name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Address" />
          @error('email')
           <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
       
      <div class="form-group">
        <label>Chose Profile Image</label>
        <input type="file" name="image" class="form-control" onchange="previewfile(this)" />
        <img id="previewimg" alt="Profile Image" style="max-width: 130px; margin-top:20px;" src="{{asset('images')}}/{{$student->image}}"/>
      </div>

      <div class="form-group row">
          <button type="submit" class="btn btn-info form-control">Update</button>
      </div>
     </form>
    </div>
   </div>
  </div>
 </div>
</div>

@endsection

@push('child-scripts')
<script>
  function previewfile(input)
  {
    var file = $("input[type=file]").get(0).files[0];
    if(file)
    {
      var reader = new FileReader();
      reader.onload = function()
      {
        $('#previewimg').attr("src", reader.result);
      }
      reader.readAsDataURL(file);
    }
  }
 </script> 
@endpush