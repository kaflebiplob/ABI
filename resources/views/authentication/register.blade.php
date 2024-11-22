<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ecommerce_</title>
    <link rel="stylesheet" href="/styles/login.css " />
</head>

<body>
    <div class="loginfunction">
        <h2>
            <a href="{{url('/')}}"><img src="/img/logo.webp" alt=""></a>
        </h2>
        <div class="login">
            <h2>Registration</h2>
            <form action="{{route('registersubmit')}}" method="POST">
            @csrf
                <div class="form-con">
                    <label for="">username</label>
                    <input type="text" name="name" required />
                </div>

                <div class="form-con">
                    <label for="">Email</label>
                    <input type="text" name="email" required/>
                </div>
                <div class="form-con">
                    <label for="">Phone</label>
                    <input type="text" name="phone" required/>
                </div>
                <div class="form-con">
                    <label for="">password</label>
                    <input type="password" name="password" required/>
                </div>
                <div class="form-con">
                    <label for="">address</label>
                    <input type="text" name="address" />
                </div>
                <div class="form-con">
                    <input type="submit" name="register" value="register" class="submitbutton" />
                </div>
            </form>
            <p>Already have account? <span><a href="{{route('login')}}">login</a></span></p>
        </div>
    </div>
</body>

</html>