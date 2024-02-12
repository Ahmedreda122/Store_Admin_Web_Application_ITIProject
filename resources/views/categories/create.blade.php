@extends('layouts.app')

@section('headSection')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
@endsection

@section('titleSection')
    Add Category
@endsection

@section('mainSection')
    <div class="container" style="width: 45%">
    <h1> Add new Category </h1>
        <form method="POST" action="{{route("categories.store")}}">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" name='name' class="form-control" value="{{ old('name') }}" >
                @error('name')
                <span style="color: red; font-weight: bold;">
                        {{ $message }}
                </span>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Add">
        </form>
    </div>
@endsection
