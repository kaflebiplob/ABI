<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABI-Products</title>
  <link rel="stylesheet" href="frontend/css/style.css" />

</head>

<body>
  <nav>
    <div class="navbar">
      <div class="logo">
        <img src="frontend/img/logo.webp" alt="logo" />
        <!-- <span>ABI</span> -->
      </div>
      <div class="page-links">
        <ul class="links">
          <li><a href="{{route('index')}}">Home</a></li>
          <li><a href="{{route('products')}}">Product</a></li>
          <li><a href="">About s</a></li>
          <li><a href="{{route('contactus')}}">Contact us</a></li>
          @if(Route::has('login'))
          @auth

          <li><a href="{{route('cart')}}">Cart[{{$cartCount}}]</a></li>

          <li><a href="{{route('myorders')}}">My orders</a></li>

          <li>
            <form action="{{ route('userlogout') }}" method="POST">
              @csrf
              <button type="submit" class="logoutbutton">Logout</button>

            </form>
          </li>
          @else

          <li><a href="{{route('login')}}">Login</a></li>
          <li><a href="{{route('register')}}">signup</a></li>
          @endauth
          @endif
        </ul>
      </div>
      <button id="toggle" class="hamburger">☰</button>
    </div>
  </nav>

  <div class="product-searchbar">
    <form action="{{route('products')}}" method="GET">
      <input type="text" name="product-search" placeholder="search product">
      <input type="submit" name="search" class="buynow" value="search">
    </form>
  </div>

  <section class="products">
    <div class="shopsection">
      <div class="shopsection">


        @if (isset($searchQuery) && $searchQuery)
        <div class="searched-products">
          <h2 class="product-title">Search Results for "{{ $searchQuery }}"</h2>
          @forelse ($searchedProducts as $product)
          <div class="product-box">
            <a href="{{ route('productdetail', $product->id) }}">
              <img src="/products/{{ $product->image }}" alt="{{ $product->name }}" />
            </a>
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->short_description }}</p>
            <p>Price: Rs {{ $product->price }}</p>
          </div>
          @empty
          <p>No products found for "{{ $searchQuery }}".</p>
          @endforelse
        </div>
        @endif

        <div class="tyres">
          <h2 class="product-title">4 Wheeler Tyres</h2>
          <div class="products-tyre">

            @foreach ($tyres as $tyre )


            <div class="product-box">
              <a href="{{route('productdetail',$tyre->id)}}"><img src="/products/{{$tyre->image}}" alt="" /> </a>
              <h3 style="margin: 1rem 0">{{$tyre->name}}</h3>
              <p class="product-desc">
                {{$tyre->short_description}}
              </p>
              <p class="product-desc">Total Stock: {{$tyre->SKU}}</p>
              <p>
                <span class="old-price">Old Price: Rs{{$tyre->old_price}}</span> <br>
                <span class="new-price">New Price: Rs{{$tyre->price}}</span>


              </p>


              <a href="" class="buynow-product">buy now</a>
              <form action="{{ route('addtocart', $tyre->id) }}" method="POST">
                @csrf
                <button type="submit" class="buynow-product">Add to cart</button>
              </form>
            </div>
            @endforeach

          </div>

        </div>
      </div>
      <div class="tyres">
        <h2 class="product-title" style="margin-top: 7rem">Battries</h2>
        <div class="products-tyre">
          @foreach ($battries as $battery)


          <div class="product-box">
            <a href="{{route('productdetail',$battery->id)}}"><img src="products/{{$battery->image}}" alt="" /> </a>
            <h3 style="margin: 1rem 0">{{$battery->name}}</h3>
            <p class="product-desc">
              {{$battery->short_description}}
            </p>
            <p class="product-desc">Total Stock: {{$battery->SKU }}</p>
            <p>
              <span class="old-price">Old Price: Rs{{$battery->old_price}}</span> <br>
              <span class="new-price">New Price: Rs{{$battery->price}}</span>


            </p>
            <a href="" class="buynow-product">buy now</a>
            <form action="{{ route('addtocart', $battery->id) }}" method="POST">
              @csrf
              <button type="submit" class="buynow-product">Add to cart</button>
            </form>
          </div>
          @endforeach

        </div>

      </div>
      <div class="shopsection">
        <div class="tyres">
          <h2 class="product-title" style="margin-top: 7rem">Lubricants</h2>
          <div class="products-tyre">
            @foreach ($lubricants as $lubricant )


            <div class="product-box">
              <a href="{{route('productdetail',$lubricant->id)}}"><img src="products/{{$lubricant->image}}" alt="" /> </a>
              <h3 style="margin: 1rem 0">{{$lubricant->name}}</h3>
              <p class="product-desc">
                {{$lubricant->short_description}}
              </p>
              <p class="product-desc">Total Stock: {{$lubricant->SKU}}</p>
              <p>
                <span class="old-price">Old Price: Rs{{$lubricant->old_price}}</span> <br>
                <span class="new-price">New Price: Rs{{$lubricant->price}}</span>


              </p>
              <a href="" class="buynow-product">buy now</a>
              <form action="{{ route('addtocart', $lubricant->id) }}" method="POST">
                @csrf
                <button type="submit" class="buynow-product">Add to cart</button>
              </form>
            </div>
            @endforeach

          </div>

        </div>
      </div>
    </div>
  </section>
  <footer class="footer">
    <div class="footer-container">

      <div class="footer-section about">
        <h3>About Us</h3>
        <p>
          We provide top-quality automotive products, including tyres, batteries, and lubricants, to ensure your vehicles run smoothly and safely.
        </p>
      </div>


      <div class="footer-section links">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="{{route('index')}}">Home</a></li>
          <li><a href="{{route('products')}}">Products</a></li>
          <li><a href="#categories">Categories</a></li>
          <li><a href="{{route('contactus')}}">Contact</a></li>
          <li><a href="#faq">FAQ</a></li>
        </ul>
      </div>


      <div class="footer-section contact">
        <h3>Contact Us</h3>
        <ul>
          <li><i class="fa fa-phone"></i> +977 9869050407</li>
          <li><i class="fa fa-envelope"></i> biplobkafle21@gmail.com</li>
          <li><i class="fa fa-map-marker"></i> Jorpati lama petrolpump, Kathmandu, Nepal</li>
        </ul>
      </div>

      <div class="footer-section social">
        <h3>Follow Us</h3>
        <div class="social-icons">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; 2024 ABI Trade link pvt ltd. All Rights Reserved.</p>
    </div>
  </footer>
  <script src="frontend/js/index.js"></script>


</body>

</html>