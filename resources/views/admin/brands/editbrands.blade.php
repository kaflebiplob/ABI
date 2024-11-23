@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" href="/styles/category.css">
<main class="maincontent">
    <div class="adminlist">

        <div class="tablelist">

            <div class="listheader">
                <div class="adminheader"
                    @include('layouts._message')>

                    <h2 class="adminbutton">Edit Brands</h2>

                </div>



            </div>
            @include('layouts._message')
            <form action="{{route('editbrandssubmit',$brands->id)}}" method="POST">
                @csrf
                <div class="form-con">
                    <label for="">Brand Name</label>
                    <input type="text" name="name" value="{{old('name',$brands->name)}}" required />
                </div>
                <div class="form-con">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{old('slug',$brands->slug)}}" required />
                </div>
                <div class="form-con">
                    <label for="">Status</label>

                    <select name="status" id="status">
                        <option value="Active" {{ old('status', $brands->status) === 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ old('status', $brands->status) === 'Inactive' ? 'selected' : '' }}>Inactive</option>
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