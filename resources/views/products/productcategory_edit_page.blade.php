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
<h5 style="padding-top:25px; color:rgb(99, 99, 99); margin-left:15px;">update product categories and measurements</h5>
<form class="p-3" action="{{ route('category.update', $category->id)}}" method="POST">
@csrf
@method('PUT')
    <div class="row">
        <div class="col">
            <label for="name">Category name</label>
          <input type="text" class="form-control" id="category" placeholder="product name"  name="category" value="{{$category->category}}">
        </div>
        <div class="col">
          <label for="name">Quanity measure</label>
        <input type="text" class="form-control" id="measure" placeholder="Quantity measure"  name="measure" value="{{ $category->measure}}">
      </div>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top: 10px">Update</button>
  </form>
</div>
<div style="margin-top:30px;" > 
    <a class="border btn-secondary" href="{{ route('category.index')}}" style="text-decoration: none;  padding:8px;">Back</a>
</div>
  </div>
@endsection