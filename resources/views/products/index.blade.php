@extends('layouts.app')

@section('headSection')

<link rel="stylesheet" href="{{ asset('css/app.css') }}" >
<script>
    function cnfrm(id) {
        var confrm = confirm('Are You sure to Delete This Item?');
        if (confrm) {
            window.location.href = "/delete/" + id;
        } else {
            console.log('Rejected');
        }
    }
</script>
@endsection

@section('titleSection')
    Home Page
@endsection

@section('mainSection')
<div>
    <h1>Products.</h1>
    <br>
    <button class='button1' type="button"><a href="{{route("products@create")}}">Add a new Product</a></button>
    <br>
    <h2>List of Products:</h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody id="tbody">
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->Name}}</td>
                <td>
                    <img alt="Product-Photo" src="{{asset("images/$product->Image")}}">
                </td>
                <td>{{$product->Price}}</td>
                <td>{{$product->category ? $product->category->Name : "None"}}</td>
                <td>
                    <button class='button1'>
                        <a href="{{route("products@show", $product->id)}}}">Show</a>
                    </button>
                </td>
                    <td>
                        <button class='button1 button2'>
                            <a href='{{route("products@edit", $product->id)}}'>Edit</a>
                        </button>
                    </td>
                <td>
                    <button type='button' class='button1 button2' onclick="cnfrm({{$product->id}})">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
