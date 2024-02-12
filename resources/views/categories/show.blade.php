@extends('layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
@endsection

@section('titleSection')
    Category info.
@endsection

@section('mainSection')
<div>
    <h1>Category Info.</h1>
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody id="tbody">
        <tr>
            <td style="font-weight: bold; background-color: white">ID</td>
            <td>{{$category->id}}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; background-color: white">Name</td>
            <td>{{$category->Name}}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; background-color: white">Created at.</td>
            <td>{{$category->created_at}}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; background-color: white">Price</td>
            <td>{{$category->updated_at}}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; background-color: white">Added By</td>
            <td>{{$category->user ? $category->user->name : "Unknown"  }}</td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>
    <h1>Products in the category</h1>
    <br>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category</th>
        </tr>
        </thead>
        <tbody id="tbody">
        @foreach($category->product as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->Name}}</td>
                <td>
                    <img src="{{asset("images/$product->Image")}}">
                </td>
                <td>{{$product->Price}}</td>
                <td>{{$category->Name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
