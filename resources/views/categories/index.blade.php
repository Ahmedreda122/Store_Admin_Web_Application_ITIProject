@extends('layouts.app')

@section('headSection')

<link rel="stylesheet" href="{{ asset('css/app.css') }}" >
{{--<script>--}}
{{--    function cnfrm(id) {--}}
{{--        var confrm = confirm('Are You sure to Delete This Item?');--}}
{{--        if (confrm) {--}}
{{--            window.location.href = "/categories/destroy/" + id;--}}
{{--        } else {--}}
{{--            console.log('Rejected');--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
@endsection

@section('titleSection')
    Categories
@endsection

@section('mainSection')
<div>
    <h1>Categories.</h1>
    <br>
    <button class='button1' type="button">
        <a href="{{route("categories.create")}}">Add a new Category</a>
    </button>
    <br>
    <h2>List of Categories:</h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Number of Products</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody id="tbody">
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->Name}}</td>
                <td>{{$category->product ? count($category->product) : 0 }}</td>
                <td>
                    <button class='button1'>
                        <a href="{{route("categories.show", $category->id)}}">Show</a>
                    </button>
                </td>
                    <td>
                    @can('update-category', $category)
                    <button class='button1 button2'>
                        <a href='{{route("categories.edit", $category->id)}}'>Edit</a>
                    </button>
                    @else
                    <button  class='button1 btn btn-secondary btn-lg' disabled>
                        <a disabled>Edit</a>
                    </button>
                    @endcan
                    </td>
                <td>
{{--                    <button type='button' class='button1 button2' onclick="cnfrm({{$category->id}})">--}}
{{--                        Delete--}}
{{--                    </button>--}}

                    <form method="POST" action="{{route('categories.destroy',$category->id)}}">
                        @csrf
                        @method('delete')
                        @can('delete-category', $category)
                        <button type="submit" class="button1 button2">
                            Delete
                        </button>
                        @else
                            <button type='button' class='button1 btn btn-secondary btn-lg' disabled>
                                Delete
                            </button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
