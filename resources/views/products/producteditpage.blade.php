<?php
use App\Models\categories;
?>
@extends('navbar_registerd_users')
@section('content')
<div class="border">
<h5 style="padding-top:25px; color:rgb(99, 99, 99); margin-left:15px;">update  product</h5>
<form class="p-3" action="{{ route('product.update', $product->id)}}" method="POST">
  @csrf
  @method('PUT')
    <div class="row">
        <div class="col">
            <label for="name">product name</label>
          <input type="text" class="form-control" name="productname" placeholder="product name" value="{{$product->productname}}" required>
        </div>
        <div class="col">
            <label for="code">product code</label>
          <input type="text" name="productcode" class="form-control" placeholder="product code" required value="{{$product->productcode}}">
        </div>
    </div>
    <div class="row" style="padding-top:12px;">
        <div class="col">
            <label for="price">product price</label>
          <input type="number" name="productprice" class="form-control" placeholder="product price" required value="{{$product->productprice}}">
        </div>
        <div class="col">
            <label for="date">expiry date</label>
          <input type="date" name="expirydate" class="form-control" value="{{$product->expirydate}}">
        </div>
    </div>
    <div class="row" style="padding-top:12px;">
        <div class="col" style="padding-bottom:20px;">
          <div class="col">
            <label for="price">Quantity</label>
          <input type="number" class="form-control" name="quantity" placeholder="product proce" value="{{ $product->quantity}}">
        </div>
        <div class="col">
          <label for="sellingprice">Selling price</label>
        <input type="number" class="form-control" name="sellingprice" placeholder="product selling price" value="{{$product->sellingprice}}">
      </div>
            <label for="measurement" class="form-label">measurement</label>
            <select id="measurement" name="measurement" class="form-select">
        <option value="{{$product->measurement}}">{{$product->measurement}}</option>
        <?php
        $categories = categories::all();
        ?>
        @foreach ($categories as $item)
        <option value="{{$item->measure}}">{{$item->measure}}</option>
        @endforeach
            </select>
        </div>
        <div class="col" style="padding-bottom:20px;">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category" class="form-select">
              <option value="{{$product->category}}">{{$product->category}}</option>
              {{-- make sure you dont display null values , implement an if here --}}
              <?php
              $categories = categories::all();
              ?>
              @foreach ($categories as $item)
              <option value="{{$item->measure}}">{{$item->measure}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">update product</button>
  </form>
</div>
<div style="margin-top:30px;" > 
    <a class="border btn-secondary" href="{{ route('product.index')}}" style="text-decoration: none;  padding:8px;">Back</a>
</div>
@endsection