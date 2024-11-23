@extends('admin.layouts.app')
@section('content')


<main class="maincontent">
    <div class="adminlist">

        <div class="tablelist">

            <div class="listheader">
                <div class="adminheader"
                    @include('layouts._message')>

                    <h2 class="adminbutton">Product List</h2>
                </div>
                <div class="addnewheader">
                    <a href="{{route('addproduct')}}">Add New Product</a>
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
                 


                    <tr>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" style="background-color: brown; text-decoration:none;" class="logoutbutton">Edit</a> <br><br>
                            <form action="" method="POST" style="display:inline;">
                                @csrf
                                @method('POST') 
                                <button type="submit" style="background-color: red; text-decoration:none; padding:8px; border-radius:5px; border:none; color:white; cursor:pointer"  onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    

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