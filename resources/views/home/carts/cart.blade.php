<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABI -Cart</title>
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
                        <td>
                            <button class="quantity-btn" onclick="updateQuantity({{ $item->id }}, -1, {{ $item->product->SKU }})">-</button>
                            <input id="quantity-{{ $item->id }}" type="number" value="{{ $item->quantity }}" readonly class="quantity-input">
                            <button class="quantity-btn" onclick="updateQuantity({{ $item->id }}, 1, {{ $item->product->SKU }})">+</button>
                        </td>
                        <td>Rs{{ number_format($item->product->price, 2) }}</td>
                        <td id="total-{{ $item->id }}">Rs{{ number_format($item->product->price * $item->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('removefromcart', $item->id) }}" method="GET">

                                <button type="submit" class="btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            <form action="{{ route('createorder') }}" method="POST">
                @csrf
                <input type="hidden" id="order-total-value" name="total_amount" value="">
                <button type="submit" class="buynow">Checkout</button>
            </form>
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
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const totalValue = document.getElementById('total-{{ $item->id }}').textContent.replace('Rs', '').replace(',', '');
            document.getElementById('order-total-value').value = totalValue;
        });
    </script>
    <script>
        function updateQuantity(itemId, change, stock) {
            const quantityInput = document.getElementById(`quantity-${itemId}`);
            const currentQuantity = parseInt(quantityInput.value);
            const newQuantity = currentQuantity + change;


            if (newQuantity < 1) {
                alert('Quantity cannot be less than 1.');
                return;
            }
            if (newQuantity > stock) {
                alert('Quantity exceeds available stock.');
                return;
            }
            quantityInput.value = newQuantity;
            const priceElement = document.querySelector(`tr td:nth-child(4)`).textContent.replace('Rs', '').replace(',', '');
            const totalElement = document.getElementById(`total-${itemId}`);
            const price = parseFloat(priceElement);
            totalElement.textContent = `Rs${(price * newQuantity).toLocaleString()}.00`;

            fetch(`/cart/update/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        quantity: newQuantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Cart updated successfully.');
                    } else {
                        alert('Failed to update the cart.');
                    }
                })
                .catch(error => {
                    console.error('Error updating the cart:', error);
                });
        }
    </script>
    <script src="/frontend/js/index.js"></script>


</body>

</html>