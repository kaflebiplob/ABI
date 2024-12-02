<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABI - Orders</title>
    <link rel="stylesheet" href="/frontend/css/style.css" />

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
    @if ($orders->isEmpty())
    <p>You have no orders yet.</p>
    @else
    <table>
        <thead>
            <tr>
                <th>Order Token</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order) {{-- Loop through the collection --}}
            <tr>
                <td>{{ $order->order_token }}</td> {{-- Access property on a single order --}}
                <td>${{ $order->amount }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>
                    <a href="{{ route('orders', $order->order_token) }}">View Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
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

    <script src="frontend/js/index.js"></script>

</body>

</html>