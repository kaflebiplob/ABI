<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Frontend panel</title>
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
                    <li><a href="">Contact us</a></li>
                    @if(Route::has('login'))
                    @auth

                    <li><a href="">Cart</a></li>
                    <li><a href="">orders</a></li>
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
                        <h1>2/75R15 tyres</h1>
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
                        <h1>2/75R15 tyres</h1>
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
                        <a href="" class="buynow-product">buy now</a>
                        <a href="" class="buynow-product">Add to cart</a>
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
                        <a href="" class="buynow-product">buy now</a>
                        <a href="" class="buynow-product">Add to cart</a>
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
                        <a href="" class="buynow-product">buy now</a>
                        <a href="" class="buynow-product">Add to cart</a>
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
                    <div class="category-logo">
                        <img src="/img/logo.webp" alt="" />
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
                    <li><a href="#contact">Contact</a></li>
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