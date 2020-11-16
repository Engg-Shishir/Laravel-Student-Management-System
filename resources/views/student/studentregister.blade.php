@extends('layout.default')

@section('content')

<div style="margin-top: 50px;"></div>
<div class="container">
 <div class="row">
  <div class="col-md-7 m-auto">
   <div class="card">
    <div class="card-header text-center">
     <strong class="h3 text-info">Registration Forn</strong>
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

     <form method="POST" action="{{ url('/register/store') }}" id="sregisterform" enctype="multipart/form-data">
       @csrf
      <div class="form-group row">
        <label for="sname" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input name="sname" type="text" class="form-control @error('sname') is-invalid @enderror" id="sname" placeholder="Student Name" />
          @error('sname')
           <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="fname" class="col-sm-2 col-form-label">Father</label>
        <div class="col-sm-10">
          <input name="fname" type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" placeholder="Father Name" />
          @error('fname')
           <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="class" class="col-sm-2 col-form-label">Class</label>
        <div class="col-sm-10">
          <input name="class" type="text" class="form-control @error('class') is-invalid @enderror" id="class" placeholder="Class Name" />
          @error('class')
           <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
          <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phonr No" />
          @error('phone')
           <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Address" />
          @error('email')
           <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="bname" class="text-info h4 col-sm-2 col-form-label">Branch</label>
        <div class="col-sm-10">
         <select name="bid" id="bname" class="form-control">
          <option>-- Select Branch --</option>
          @foreach ($brances as $brance)
        <option value="{{$brance->id}}">{{$brance->bfull}}</option> 
          @endforeach
        </select>
      </div>
     </div>

     <div class="form-group row">
       <label for="courses" class="text-info h4 col-sm-2 col-form-label ">Course</label>
       <div class="col-sm-10">
        <select name="cid" id="cname"class="form-control">
        </select>
     </div>
    </div>
     
     <div class="form-group row">
       <label for="image" class="text-info h4 col-sm-2 col-form-label ">Image</label>
       <div class="col-sm-10">
         <input type="file" name="image" id="image" onchange="previewfile(this)"/>
       </div>
        <img id="previewimg"style="max-width: 130px; margin-top:20px;" />
    </div>

    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

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

@push('child-scripts')
<script>

$(document).on('change','#bname', function(){

    $.ajax({
    type:"GET",
    dataType:"json",
    url:"/ctudent/course/"+$(this).val(),
      success: function(data){
    var courses = '<option>-- Select Courses --</option>';
       var arr = data.courses.length;
      var aa =  data.courses;

     for(var i=0; i<arr; i++){
          courses += '<option value="' +aa[i].id+ '">'+aa[i].cname+'</option>';

      } 

        
        $("#cname").html(courses);
      }
    });

  });
</script>

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