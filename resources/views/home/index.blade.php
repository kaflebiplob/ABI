<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ABI Trade Link</title>
    <link rel="stylesheet" href="frontend/css/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
    <main>
        <div class="mainsection">


            <div class="main-content">
                @include('layouts._message')

                <div class="slider-content">
                    <div class="desc">
                        <h1>215/75R15 tyre</h1>
                        <p class="desc-def">
                            The 215/75R15 tire is 215 mm wide, has a sidewall height that's
                            75% of its width, fits 15-inch rims, and is a radial type. It's
                            commonly used on SUVs and light trucks for good comfort and
                            stability.
                        </p>
                        <a href="" class="buynow">buy now</a>
                    </div>
                    <div class="desc-image">
                        <a href=""><img src="frontend/img/tyre.png" alt="215/75R15 ceat tyre" /></a>
                    </div>
                </div>

                <div class="slider-content">
                    <div class="desc">
                        <h1>235/75R15 tyres</h1>
                        <p class="desc-def">
                            The 235/75R15 tire is 215 mm wide, has a sidewall height that's
                            75% of its width, fits 15-inch rims, and is a radial type. It's
                            commonly used on SUVs and light trucks for good comfort and
                            stability.
                        </p>
                        <a href="" class="buynow">buy now</a>
                    </div>
                    <div class="desc-image">
                        <a href=""><img src="/products/1733405035.jpg" alt="235/75R15 ceat tyre" height="200px" /></a>
                    </div>
                </div>
                <div class="slider-content">
                    <div class="desc">
                        <h1>155/70R13 tyres</h1>
                        <p class="desc-def">
                            The CEAT Milaze X3 155/70R13 75T is a tubeless radial tyre designed for durability and longevity, often referred to as the "1 lakh km tyre" due to its potential lifespan of up to 100,000 kilometers under standard test conditions.
                        </p>
                        <a href="" class="buynow">buy now</a>
                    </div>
                    <div class="desc-image">
                        <a href=""><img src="/products/1733404787.jpg" alt="155/70R13 ceat tyre" /></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <section class="shop">
        <div class="shopsection">

            <div class="tyres">
                <h2 class="product-title"> Tyres</h2>
                <div class="products-tyre">
                    @foreach ($tyres as $tyre )


                    <div class="product-box">
                        <a href="{{route('productdetail',$tyre->id)}}"><img src="products/{{$tyre->image}}" alt="" /> </a>
                        <h3 style="margin: 1rem 0">{{$tyre->name}}</h3>
                        <p class="product-desc">
                            {{$tyre->short_description}}
                        </p>
                        <p class="product-desc">Available Stock: {{$tyre->SKU}}</p>
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
                <div class="see-all-products">
                    <a href="{{route('products')}}" class="btn-see-all">See All Products</a>
                </div>
            </div>
        </div>
        <div class="shopsection">
            <div class="tyres">
                <h2 class="product-title" style="margin-top: 7rem">Battries</h2>
                <div class="products-tyre">
                    @foreach ($battries as $battery )


                    <div class="product-box">
                        <a href="{{route('productdetail',$battery->id)}}"><img src="products/{{$battery->image}}" alt="" /> </a>
                        <h3 style="margin: 1rem 0">{{$battery->name}}</h3>
                        <p class="product-desc">
                            {{$battery->short_description}}
                        </p>
                        <p class="product-desc">Total Stock: {{$battery->SKU}}</p>
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
                <div class="see-all-products">
                    <a href="{{route('products')}}" class="btn-see-all">See All Products</a>
                </div>
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
                <div class="see-all-products">
                    <a href="{{route('products')}}" class="btn-see-all">See All Products</a>
                </div>
            </div>
        </div>
    </section>

    <section class="category">
        <div class="categorysection">
            <div class="category-product">
                <h2 class="category-title">Category</h2>
                <div class="categorylayout">
                    <div class="categorylist">
                        <div class="category-box">
                            <img src="frontend/img/tyre.png" alt="" />
                            <h4>Tyres</h4>
                        </div>
                        <div class="category-box">
                            <img src="frontend/img/tyre.png" alt="" />
                            <h4>Battry</h4>
                        </div>
                        <div class="category-box">
                            <img src="frontend/img/tyre.png" alt="" />
                            <h4>lubricants</h4>
                        </div>
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
                    <a href="https://www.facebook.com/profile.php?id=100047124621709"><i class="fa fa-facebook"></i></a>
                    
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/biplob-kafle-56b16925a/"><i class="fa fa-linkedin"></i></a>
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