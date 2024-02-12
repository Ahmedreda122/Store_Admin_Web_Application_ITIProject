@extends('layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
@endsection

@section('titleSection')
    Item info.
@endsection

@section('mainSection')
<br><br>
<div>
    <h1>Product Info.</h1>
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
            <td>{{$product->id}}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; background-color: white">Name</td>
            <td>{{$product->Name}}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; background-color: white">Desc.</td>
            <td>{{$product->Description}}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; background-color: white">Price</td>
            <td>{{$product->Price}}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; background-color: white">Category</td>
            <td>{{$product->category ? $product->category->Name : "None"}}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; background-color: white">Img</td>
            <td>
                <img src="{{asset("images/$product->Image")}}">
            </td>
        </tr>
        </tbody>
    </table>
</div>
@endsection
