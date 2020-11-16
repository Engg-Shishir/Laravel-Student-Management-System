<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/all.min.css')}}">
 <title>Document</title>
</head>
<body>
<div class="container border d-flex justify-content-center align-items-center" style="height: 100vh;">
 <div class="row" style="width: 100%;">
  <div class="col-md-7 m-auto">
   <div class="card">
    <div class="card-header text-center">
     <span class="h3 text-info">Go Your Action</span>
    </div>

    <div class="card-body">

     @if(Session::has('error'))
       <div class="alert alert-danger text-center">
       <strong>{{Session::get('error')}}</strong>
       </div>
     @endif

     <form method="POST" action="{{route('login')}}">
      @csrf
      <div class="form-group">
        <label for="username">User Nnme</label>
        <input name="username" type="text" class="form-control" id="username" />
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
      </div>
      
      <button type="submit" class="btn btn-info form-control">LogIn</button>
    </form>
    </div>
   </div>
  </div>
 </div>
</div>
</body>
</html>