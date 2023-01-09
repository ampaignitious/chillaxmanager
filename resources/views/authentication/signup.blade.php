@extends('index')
@section('content')
<h5 style="padding-top:25px; color:rgb(99, 99, 99);">Create a user account</h5>
<form class="p-3" >
    <div class="mb-3 g-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" required>
      </div>
    <div class="mb-3 g-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm password</label>
        <input type="password" class="form-control" name="confirmpassword" required>
      </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
      <label class="form-check-label" for="exampleCheck1">Do you agree to terms and conditions</label>
    </div>
    <button type="submit" class="btn btn-primary">SignUp</button>
    <button type="submit" class="btn btn-danger" style="margin-left: 100px">Login</button>
  </form>
@endsection