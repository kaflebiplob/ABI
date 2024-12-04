@extends('admin.layouts.app')
@section('content')
<main class="maincontent">
    <div class="adminlist">

        <div class="tablelist">

            <div class="listheader">
                <div class="adminheader"
                    @include('layouts._message')>

                    <h2 class="adminbutton">Order List List</h2>
                </div>

            </div>

            <table class="striped">
                <thead>
                    <tr>

                        <th>Username</th>
                        <th>phone</th>
                        <th>address</th>
                        <th>token</th>
                        <th>Amount</th>
                        <th>status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order )


                    <tr>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->user->phone}}</td>
                        <td>{{$order->user->address}}</td>

                        <td>{{$order->order_token}}</td>
                        <td>{{$order->amount}}</td>
                        <td>{{$order->status}}</td>
                        <td>

                            <button type="submit" class="edit-button">Pending</button>
                            <a href="{{route('delivered',$order->id)}}"><button type="submit" class="addnewheader" >Delivered</button></a>
                            <a href="{{route('ontheway',$order->id)}}"><button type="submit" class="addnewheader" >On the way</button></a>
                            <form action="{{ route('deleteorder', $order->id) }}" method="POST" style="display:inline;">
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