

@extends('admin.layouts.app')
@section('content')


<main class="maincontent">
    <div class="adminlist">

        <div class="tablelist">

            <div class="listheader">
                <div class="adminheader">

                    <h2 class="adminbutton">Admin List</h2>
                </div>
                <div class="addnewheader">
                    <a href="{{route('addadmin')}}">Add New Admin</a>
                </div>
            </div>

          
        </div>

    </div>

  
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logoutbutton">Logout</button>

    </form>

</main>
@endsection