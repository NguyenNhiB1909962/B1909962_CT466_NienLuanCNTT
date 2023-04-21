<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng Nhập</title>

    <link href="public/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/frontend/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</head>
<body class="container" style="background: url(public/backend/images/bg1.jpg)">
    <div class="container">
        <h1 class="text-center pb-3" style="font-size: 45px">Login</h1>
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="{{route('admin_login')}}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success" style="font-size: 18px">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger" style="font-size: 18px">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group" style="font-size: 25px">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" style="font-size: 20px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{old('email')}}">
                    <span class="text-danger" style="font-size: 18px">@error('email') {{$message}} @enderror</span>
                </div>
                <div class="form-group" style="font-size: 25px">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" style="font-size: 20px" id="exampleInputPassword1" placeholder="Password" name="password" value="">
                    <span class="text-danger" style="font-size: 18px">@error('password') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <div style="font-size: 20px; text-align:right">
                        Do not have an account? 
                        <a href="admin_register">Register</a>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary"style=" font-size: 20px">Login</button>
            </form>
        </div>
    </div>
</html>