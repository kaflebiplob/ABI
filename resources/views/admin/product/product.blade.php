@extends('admin.layouts.app')
@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
    }

    .maincontent {
        width: 90%;
        margin: auto;
        background: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }


    .tablelist {
        margin-top: 20px;
    }



    .add-product-btn {
        text-decoration: none;
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 14px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        text-align: left;
        padding: 12px;
        border: 1px solid #ddd;
        color: black;
    }

    thead {
        background-color: #007bff;
        color: white;
    }

    td img {
        max-width: 200px;
        margin-right: 10px;
        vertical-align: middle;
    }

    .status {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 12px;
        font-weight: bold;
        text-align: center;
        color: white;
    }

    .status.available {
        background-color: #28a745;
    }

    .status.disabled {
        background-color: #dc3545;
    }





    @media (max-width: 768px) {

        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        tr {
            margin-bottom: 15px;
        }

        td {
            text-align: right;
            position: relative;
        }

        td:before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            font-weight: bold;
            text-align: left;
        }

        th {
            display: none;
        }

        .adminlist {
            margin-top: 3rem;
        }
    }
</style>

<main class="maincontent">
    <div class="adminlist">

        <div class="tablelist">

            <div class="listheader">
                <div class="adminheader">
                    @include('layouts._message')
                    <h2 class="adminbutton">Product List</h2>
                </div>
                <div class="addnewheader">
                    <a href="{{ route('addproduct') }}" class="add-product-btn">Add New Product</a>
                </div>
            </div>

            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->SKU }}</td>
                        <td>Rs:{{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->brand->name ?? 'No Brand' }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td><img src="products/{{$product->image}}" width="200" height="200" alt=""></td>
                        <td>
                            <span class="status {{ $product->status ? 'available' : 'disabled' }}">
                                {{ $product->status ? 'Available' : 'Disabled' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{route('editproduct',$product->id)}}" class="edit-button">Edit</a>
                            <form action="{{route('deleteproduct',$product->id)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
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