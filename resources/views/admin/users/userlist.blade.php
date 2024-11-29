@extends('admin.layouts.app')
@section('content')
<style>
    h2{
        margin: 2rem 0;
        color: #333;
        font-family: 'Courier New', Courier, monospace;
    }
</style>

<main class="maincontent">
    <div class="adminlist">

      <div class="userlist">
        <h2>No of users:{{$users}}</h2>
      </div>
      <div class="orderlist">
      <h2>   No of orders: </h2>  
      </div>
      <div class="productlist">
        <h2>No of Product:{{$products}}</h2>
      </div>
      <div class="brandlist">
        <h2>No of Brands:{{$brands}}</h2>
      </div>
      <div class="categorylist">
        <h2>No of category:{{$category}}</h2>
      </div>
    

    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logoutbutton">Logout</button>

    </form>

</main>
@endsection