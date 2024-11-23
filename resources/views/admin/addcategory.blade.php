@extends('admin.layouts.app')
@section('content')
<style>
    /* General Form Styling */
    form {
        width: 100%;
        max-width: 500px;
        margin: 20px auto;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
    }

    .form-con {
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
    }

    /* Labels */
    .form-con label {
        margin-bottom: 5px;
        font-weight: bold;
        font-size: 14px;
        color: #333;
    }


    .form-con input[type="text"],
    select {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    /* Input Hover/Focus States */
    .form-con input[type="text"]:focus {
        border-color: #007BFF;
        outline: none;
    }

    /* Submit Button */
    .submitbutton {
        padding: 10px 15px;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        background-color: #007BFF;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    .submitbutton:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }
</style>

<main class="maincontent">
    <div class="adminlist">

        <div class="tablelist">

            <div class="listheader">
                <div class="adminheader">

                    <h2 class="adminbutton">Add New Category</h2>
                </div>

            </div>
            <form action="{{route('addcategorysubmit')}}" method="POST">
                @csrf
                <div class="form-con">
                    <label for="">Category Name</label>
                    <input type="text" name="name" required />
                </div>
                <div class="form-con">
                    <label for="">Slug</label>
                    <input type="text" name="slug" required />
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