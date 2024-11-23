@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" href="/styles/category.css">
<main class="maincontent">
    <div class="adminlist">

        <div class="tablelist">

            <div class="listheader">
                <div class="adminheader"
                    @include('layouts._message')>

                    <h2 class="adminbutton">Edit Category</h2>
                </div>


            </div>
            <form action="{{route('editcategory',$categorys->id)}}" method="POST">
                @csrf
                <div class="form-con">
                    <label for="">Category Name</label>
                    <input type="text" name="name" value="{{old('name',$categorys->name)}}" required />
                </div>
                <div class="form-con">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{old('slug',$categorys->slug)}}" required />
                </div>
                <div class="form-con">
                    <label for="">Status</label>

                    <select name="status" id="status">
                        <option value="Active" {{old('status',$categorys->status)}}>Active</option>
                        <option value="Inactive" {{old('status',$categorys->status)}}>Inactive</option>
                    </select>
                </div>
                <div class="form-con">
                    <input type="submit" name="update" value="update" class="submitbutton" />
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