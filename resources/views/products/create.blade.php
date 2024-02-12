@extends('layouts.app')

@section('headSection')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
@endsection

@section('titleSection')
    Add Product
@endsection

@section('mainSection')
    <div class="container" style="width: 45%">
    <h1> Add new Product </h1>
        <form method="POST" action="{{route("products@store")}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" name='name' class="form-control" value="{{ old('name') }}" >
                @error('name')
                <div style="color: red; font-weight: bold;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Description</label>
                <input type="text"  name='desc' class="form-control" value="{{old('desc')}}" >
                @error('desc')
                <div style="color: red; font-weight: bold;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Price</label>
                <input type="number" name="price" class="form-control" >
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
            <div class="mb-3">
                <label  class="form-label">Image</label>
                <input type="file" name='image' class="form-control" >
            </div>
            <input type="submit" class="btn btn-primary" value="Add">
        </form>
    </div>
@endsection
