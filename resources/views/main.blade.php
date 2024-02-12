@extends('layouts.app')

@section('headSection')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
@endsection

@section('titleSection')
    Home page
@endsection

@section('mainSection')
    <div class="container">
        <div style="margin-bottom: 50px;">

    <h1 class="h1" style="margin:0; text-align: center">Welcome to our Web App</h1>
        </div>
    <div>
        <ul>
            <li class="list-group-item">
                <button class="button1">
                    <a href="{{route("products@index")}}">Products</a>
                </button>
            </li>
            <li class="list-group-item">
                <button class="button1">
                    <a href="{{route("categories.index")}}">Categories</a>
                </button>
            </li>
{{--            {{route("categories.index")}}--}}
        </ul>
    </div>
    </div>

@endsection
