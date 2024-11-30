<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABI - ProductDetail</title>
    <link rel="stylesheet" href="/frontend/css/style.css" />

</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">
                <img src="/frontend/img/logo.webp" alt="logo" />
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
        <section class="mainsection">
            <div class="mainproductdetail">
                <h2 class="detail-name">Product: {{$products->name}}</h2>
                <div class="productdetail">

                    <div class="detail-imagepart">
                        <img src="/products/{{$products->image}}" alt="">

                    </div>
                    <div class="detail-intropart">
                        <h3>{{$products->brand->name}}</h3>
                        <h3>Total Stock: {{$products->SKU}}</h3>
                        <h3>
                            <span class="old-price">Old Price: Rs{{$products->old_price}}</span> <br>
                            <span class="new-price">New Price: Rs{{$products->price}}</span>
                        </h3>
                        <p>{{$products->short_description}}</p>
                        <p>{{$products->description}}</p>
                        <p> <span>
                                <h3>Additional Information</h3>
                            </span> {{$products->additional_information}}</p>
                        <a href="" class="buynow">buy now</a>
                        <a href="" class="buynow">Add to cart</a>

                    </div>
                </div>
            </div>
        </section>
    </main>
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

    <script src="/frontend/js/index.js"></script>
</body>

</html>