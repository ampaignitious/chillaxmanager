<?php
use App\Models\categories;
?>

@extends('navbar_registerd_users')
@section('content')
<div class="border">
<h5 style="padding-top:25px; color:rgb(99, 99, 99); margin-left:15px;">add a product</h5>
<form class="p-3" action="{{ route('product.store')}}" method="POST">
  @csrf
    <div class="row">
        <div class="col">
            <label for="name">product name</label>
          <input type="text" class="form-control" name="productname" placeholder="product name" required>
        </div>
        <div class="col">
            <label for="code">product code</label>
          <input type="text" name="productcode" class="form-control" placeholder="product code" required>
        </div>
    </div>
    <div class="row" style="padding-top:12px;">
        <div class="col">
            <label for="price">product price</label>
          <input type="number" name="productprice" class="form-control" placeholder="product price" required>
        </div>
        <div class="col">
            <label for="date">expiry date</label>
          <input type="date" name="expirydate" class="form-control" >
        </div>
    </div>
    <div class="row" style="padding-top:12px;">
        <div class="col" style="padding-bottom:20px;">
          <div class="col">
            <label for="price">Quantity</label>
          <input type="number" class="form-control" name="quantity" placeholder="product proce">
        </div>
        <div class="col">
          <label for="sellingprice">Selling price</label>
        <input type="number" class="form-control" name="sellingprice" placeholder="product selling price">
      </div>
            <label for="measurement" class="form-label">measurement</label>
            <select id="measurement" name="measurement" class="form-select">
      <?php
        $categories = categories::all();
        var_dump($categories);
        ?>
        @foreach ($categories as $item)
        <option value="{{$item->measure}}">{{$item->measure}}</option>
        @endforeach
            </select>
        </div>
        <div class="col" style="padding-bottom:20px;">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category" class="form-select">
              @foreach ($categories as $item)
              <option value="{{$item->category}}">{{$item->category}}</option>
              {{-- make sure you dont display null values , implement an if here --}}
              @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">register product</button>
  </form>
</div>
@endsection