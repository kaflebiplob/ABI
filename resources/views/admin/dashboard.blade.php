@extends('admin.layouts.app')
@section('content')


<main class="maincontent">
    <div class="adminlist">

        <div class="tablelist">

            <div class="listheader">
                <div class="adminheader">

                    <h2 class="adminbutton">Dashboard</h2>
                </div>
                <div class="addnewheader">
                    <a href="{{url('category')}}">Add dashboard</a>
                </div>
            </div>

            <table class="striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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