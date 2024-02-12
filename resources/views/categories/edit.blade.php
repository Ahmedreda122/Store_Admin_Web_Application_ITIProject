@extends('layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
@endsection

@section('titleSection')
    Edit Category info.
@endsection

@section('mainSection')
    <div class="container" style="width: 45%">
        <h1> Edit Product {{$category->id}}</h1>
        <form method="POST" action="{{route("categories.update",  $category->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" name='name' class="form-control" value="{{ $category->Name }}" >
                @error('name')
                <span style="color: red; font-weight: bold;">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Edit">
        </form>
    </div>
@endsection
