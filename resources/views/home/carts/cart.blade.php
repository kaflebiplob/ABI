<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABI - Cart</title>
    <link rel="stylesheet" href="/frontend/css/style.css" />
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
    <!-- <main>
        <div class="container cart-container">
            <h2>Your Cart</h2>
            @if($cartItems->isEmpty())
            <p class="empty-cart">Your cart is empty.</p>
            @else
            <table class="table cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td><img src="/products/{{$item->product->image}}" alt="{{ $item->product->name }}" class="product-image"></td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rs{{ number_format($item->product->price, 2) }}</td>
                        <td>Rs{{ number_format($item->product->price * $item->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('removefromcart', $item->id) }}" method="GET">
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </main> -->
    <main>
        @if (session('success'))
        <p style="color: green; text-align:center">{{ session('success') }}</p>
        @endif
        @if (session('error'))
        <p style="color: red; text-align:center">{{ session('error') }}</p>
        @endif
        <div class="container cart-container">
            <h2>Your Cart</h2>
            @if($cartItems->isEmpty())
            <p class="empty-cart">Your cart is empty.</p>
            @else
            <table class="table cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>
                            <img src="/products/{{ $item->product->image }}"
                                alt="{{ $item->product->name }}"
                                class="product-image">
                        </td>
                        <td>
                            <form action="{{ route('updateCart') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                <input type="hidden" name="action" value="decrement">
                                <button type="submit" class="quantity-btn">-</button>
                            </form>
                            <input type="number" value="{{ $item->quantity }}" readonly class="quantity-input">
                            <form action="{{ route('updateCart') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                <input type="hidden" name="action" value="increment">
                                <button type="submit" class="quantity-btn">+</button>
                            </form>
                        </td>
                        <td>Rs{{ number_format($item->product->price, 2) }}</td>
                        <td>Rs{{ number_format($item->product->price * $item->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('removefromcart', $item->id) }}" method="GET">
                                <button type="submit" class="btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <h4>Total Amount: Rs{{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</h4>
            </div>
            <form action="{{ route('createorder') }}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="{{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}">
                <button type="submit" class="buynow">Checkout</button>
            </form>
            @endif
        </div>
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
                <a href="https://www.facebook.com/profile.php?id=100047124621709"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/biplob-kafle-56b16925a/"><i class="fa fa-linkedin"></i></a>
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