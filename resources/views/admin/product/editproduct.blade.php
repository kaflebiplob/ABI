    @extends('admin.layouts.app')
    @section('content')
    <link rel="stylesheet" href="/styles/addproduct.css">

    <main class="maincontent">
        <div class="adminlist">
            <div class="tablelist">
                <div class="listheader">
                    <div class="adminheader">
                        <h2 class="adminbutton">Add New Product</h2>
                    </div>
                </div>

                <form action="{{route('editproductsubmit',$products->id)}}" method="POST" class="form-container" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter product name" value="{{$products->name}}" required />
                    </div>


                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" placeholder="Enter product slug" value="{{$products->slug}}" required />
                    </div>


                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input type="text" name="sku" id="sku" placeholder="Enter SKU" value="{{$products->SKU}}" required />
                    </div>


                    <div class="form-group">
                        <label for="price">Rs:Price</label>
                        <input type="text" name="price" id="price" placeholder="Enter product price" value="{{$products->price}}" required />
                    </div>


                    <div class="form-group">
                        <label for="old_price">Rs:Old Price</label>
                        <input type="text" name="old_price" id="old_price" placeholder="Enter old price" value="{{$products->old_price}}" required />
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" id="short_description" rows="3" placeholder="Enter short description">{{$products->short_description}}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="5" placeholder="Enter detailed description">{{$products->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="old_price">Current Image</label>
                        <img src="/products/{{$products->image}}" alt="">
                    </div>

                    <div class="form-group">
                        <label for="old_price">New Image</label>
                        <input type="file" name="image" id="image" placeholder="" value="{{$products->image}}"  />
                    </div>
                    <div class="form-group">
                        <label for="additional_information">Additional Information</label>
                        <textarea name="additional_information" id="additional_information" rows="5" placeholder="Enter additional information">{{$products->additional_information}}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="shipping_returns">Shipping Returns</label>
                        <input type="text" name="shipping_returns" id="shipping_returns" value="{{$products->shipping_returns}}" placeholder="Enter shipping and returns details" required />
                    </div>


                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <select name="brand_id" id="brand">
                            <option value="" disabled selected>Select a brand</option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id}}" {{ $products->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category">
                            <option value="" disabled selected>Select a category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $products->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="submitbutton" />
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