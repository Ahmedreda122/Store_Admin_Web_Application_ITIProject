@extends('layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
@endsection

@section('titleSection')
    Edit Product info.
@endsection

@section('mainSection')
    <div class="container" style="width: 45%">
    <h1> Edit Product {{$product->id}}</h1>
    <form method="POST" action="{{route("products@update",  $product->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" name='name' class="form-control" value="{{ $product->Name }}" >
            @error('name')
            <span style="color: red; font-weight: bold;">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text"  name='desc' class="form-control" value="{{$product->Description}}" >
            @error('desc')
            <span style="color: red; font-weight: bold;">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="{{$product->Price}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Category</label>
            <select class="form-select" name='categoryID' aria-label="Default select example">
                <option selected disabled>Open this select menu</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->Name}}</option>
                @endforeach
            </select>
        </div>
<?php
        if (isset($product->category_id)) :
 ?>
        <script>
            document.querySelector("[value='<?="{$product->category_id}"?>']").selected = true;
        </script>
<?php
        endif;
?>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <div>
                <img src="{{asset("images/$product->Image")}}" height="200" style="margin-left: 12px;">
            </div>
            <input type="file" name='image' class="form-control">
        </div>
        <input type="submit" class="btn btn-primary" value="Edit">
    </form>
    </div>
@endsection
