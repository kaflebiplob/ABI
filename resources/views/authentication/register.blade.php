<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ABI - Register</title>
    <link rel="stylesheet" href="/styles/login.css " />
</head>

<body>
    <div class="loginfunction">
        @if (session('success'))
        <p style="color: green; text-align:center">{{ session('success') }}</p>
        @endif
        @if (session('error'))
        <p style="color: red; text-align:center">{{ session('error') }}</p>
        @endif
        <h2>
            <a href="{{url('/')}}"><img src="/img/logo.webp" alt=""></a>
        </h2>
        <div class="login">
            <h2>Registration</h2>
            <form action="{{ route('registersubmit') }}" method="POST">
                @csrf
                <div class="form-con">
                    <label for="name">Username</label>
                    <input type="text" name="name" value="{{ old('name') }}" required />
                    @error('name')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-con">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ old('email') }}" required />
                    @error('email')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-con">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" required />
                    @error('phone')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-con">
                    <label for="password">Password</label>
                    <input type="password" name="password" required />
                    @error('password')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-con">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{ old('address') }}" />
                    @error('address')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-con">
                    <input type="submit" name="register" value="Register" class="submitbutton" />
                </div>
            </form>

            <p>Already have account? <span><a href="{{route('login')}}">login</a></span></p>
        </div>
    </div>
</body>

</html>