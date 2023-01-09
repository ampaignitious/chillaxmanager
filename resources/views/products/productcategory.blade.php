@extends('navbar_registerd_users')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
   <p>Details not saved</p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p class="text-success">{{ $message}}</p>
</div>
@endif
<div class="border">
<h5 style="padding-top:25px; color:rgb(99, 99, 99); margin-left:15px;">add product categories and measurements</h5>
<form class="p-3" action="{{ route('category.store')}}" method="POST">
  @csrf
    <div class="row">
        <div class="col">
            <label for="name">Category name</label>
          <input type="text" class="form-control" id="category" placeholder="product name"  name="category">
        </div>
        <div class="col">
          <label for="name">Quanity measure</label>
        <input type="text" class="form-control" id="measure" placeholder="Quantity measure"  name="measure">
      </div>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top: 10px">register</button>
  </form>
</div>
  <div class="container " style="margin-top: 15px;">
    <div class="row">
      <p>Available categories and measures</p>

      <!-- category table content-->

  <table class="table table-striped table-hover">
        <thead>
            <tr>
              <th scope="col">category name</th>
              <th scope="col">measurements</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          @foreach ($categories as $units)
            <tr>
              <td>{{ $units->category}}</td>
              <td>{{ $units->measure}}</td>
              <form action="{{ route('category.destroy', $units->id)}}" method="POST">
                {{-- <td><a  class="btn border" href="{{ route('category.show', $units->id)}}">Show</a></td> --}}
                <td><a class="btn border btn-secondary" href="{{ route('category.edit', $units->id)}}" >Edit</a></td>
                @csrf
                @method('DELETE')
                <td><button type="submit" class="btn btn-danger">Delete</button></td>
                </form>
            </tr>
            @endforeach
          </tbody>
      </table> 
    </div>
  </div>
@endsection