@extends('index')
@section('content')
<h6 style="padding-top:25px; color:rgb(99, 99, 99); text-align:center;">enter user details to continue</h6>
<hr class="dropdown-divider">
<form class="p-3" >
    <div class="mb-3 g-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" required>
    </div>
    <button type="submit" class="btn btn-danger">Login</button>
  </form>
@endsection
