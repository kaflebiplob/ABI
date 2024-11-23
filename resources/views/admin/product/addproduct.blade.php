@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" href="/styles/category.css">


<main class="maincontent">
    <div class="adminlist">

        <div class="tablelist">

            <div class="listheader">
                <div class="adminheader">

                    <h2 class="adminbutton">Add New Product</h2>
                </div>

            </div>
            <form action="{{route('addproductsubmit')}}" method="POST">
                @csrf
                <div class="form-con">
                    <label for="">Product Name</label>
                    <input type="text" name="name" required />
                </div>
                <div class="form-con">
                    <label for="">Slug</label>
                    <input type="text" name="slug" required />
                </div>
                <div class="form-con">
                    <label for="">Product Name</label>
                    <input type="text" name="name" required />
                </div> 
                <div class="form-con">
                    <label for="">Status</label>

                    <select name="status" id="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="form-con">
                    <input type="submit" name="submit" value="submit" class="submitbutton" />
                </div>
            </form>


        </div>

    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logoutbutton">Logout</button>

    </form>

</main>
@endsection