@extends('admin.layouts.app')
@section('content')


<main class="maincontent">
    <div class="adminlist">

        <div class="tablelist">

            <div class="listheader">
                <div class="adminheader"
                    @include('layouts._message')>

                    <h2 class="adminbutton">Brands List</h2>
                </div>
                <div class="addnewheader">
                    <a href="{{route('addbrands')}}">Add New Brand</a>
                </div>
            </div>

            <table class="striped">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Slug</th>
                        <th>status</th>
                        <th>Created_by</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand )


                    <tr>

                        <td>{{$brand->name}}</td>
                        <td>{{$brand->slug}}</td>
                        <td>{{$brand->status}}</td>
                        <td>{{ $brand->creator ? $brand->creator->name : 'N/A' }}</td>

                        <td>
                            <a href="{{route('editbrands',$brand->id)}}" class="edit-button">Edit</a> <br><br>
                            <form action="{{ route('deletebrands', $brand->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
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