@extends('admin.layouts.app')
@section('content')


<main class="maincontent">
    <div class="adminlist">

        <div class="tablelist">

            <div class="listheader">
                <div class="adminheader"
                    @include('layouts._message')>

                    <h2 class="adminbutton">Category List</h2>
                </div>
                <div class="addnewheader">
                    <a href="{{route('addcategory')}}">Add New Category</a>
                </div>
            </div>

            <table class="striped">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Slug</th>
                        <th>status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )


                    <tr>

                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->status}}</td>
                        <td>
                            <a href="{{route('edit_category',$category->id)}}" class="edit-button">Edit</a> <br><br>
                            <form action="{{ route('deletecategory', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit"  class="delete-button" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logoutbutton">Logout</button>

    </form>

</main>
@endsection