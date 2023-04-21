<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang Chủ</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</head>
<body class="container">
    <header style="background-image: url({{asset('public/frontend/images/nen.jpg')}})">
        <div class="p-3">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div>
							<a href="#"><img src="{{asset('public/frontend/images/logo.jpg')}}" alt="" /></a>
						</div>
					</div>
                    <div class="col-sm-4">
                        <h1 style="font-family: cursive; font-size: 40px" class="pt-5">Thế Giới LapTop</h1>
                    </div>
					<div class="col-sm-4">
						<div style="font-size: 20px">
							<ul class="nav justify-content-end">
								<li><a href="{{URL::to('cart')}}" class="text-dark"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle pt-3 px-3 rounded-circle border border-info bg-success text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$data->name}}
                                    </a>
                                    <div class="dropdown-menu bg-secondary" style="font-size: 25px; background-color: FloralWhite" aria-labelledby="navbarDropdown">
                                        <a href="{{URL::to('/order')}}" class="text-white" style="font-size: 20px"><i class="fas fa-shopping-bag"></i> Order</a>
                                        <a href="{{URL::to('/login')}}" class="text-white" style="font-size: 20px"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                    </div>
                                </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" style="font-size: 20px" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{URL::to('/home_page')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    &nbsp;
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Shop Products
                        </a>
                        <div class="dropdown-menu bg-secondary" style="font-size: 25px; background-color: FloralWhite" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{URL::to('/product_home')}}">Products</a>
                        </div>
                    </li>
                    &nbsp;
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('/contact_user')}}">Contact</a>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="{{URL::to('/search')}}" method="POST">
                        @csrf
                        <input class="form-control mr-sm-2" style="height: 30px; font-size: 15px" type="text" name="key" placeholder="Search">
                        <input class="form-control mr-sm-2" style="height: 30px; font-size: 15px; background-color: forestgreen; color: #e8e8e8" type="submit" name="search_pro" value="Find">
                    </form>
                </div>
            </nav>
        </div>
    </header>

    &nbsp;
    <section id="cart_items">
		<div class="container" style="font-size: 15px">
			<h2 style="color: blueviolet; text-align: center"><b>ORDER</b></h2>
			<br>
			<div class="table-responsive cart_info">
				<?php 
				$content = Cart::content();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach ($order_de_product as $key => $pro)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" alt="" height="180px" width="180px"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$pro->product_name}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($pro->product_price).' '.'VND'}}</p>
							</td>
							<td class="cart_quantity">
                                <p>{{$pro->product_quantity}}</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
									$subtotal = $pro->product_price * $pro->product_quantity;
									echo number_format($subtotal).' '.'VND';
									?>
								</p>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> 
	
	<section>
		<hr>
		<div class="col-sm-8"></div>
		<div class="col-sm-4 border">
			<div>
                @foreach ($order_product as $key => $prod)
				<ul style="list-style: none; font-size: 18px; text-align: left">
                    <li><b>Order code</b> <span style="float: right">{{$prod->order_id}}</span></li>
					<li><b>Into money</b> <span style="float: right">{{$prod->order_total}}</span></li>
                    <hr>
				</ul>
                @endforeach
			</div>
		</div>
	</section>

    &nbsp;&nbsp;

    <footer>
        <div class="container">
			<div style="font-size: 20px; background-color: lightgrey; text-align: center">
				<a href="#"><i class="fa fa-phone"></i> +18007061</a>
                <br>
                <a href="#"><i class="fa fa-envelope"></i> thegioilaptop@gmail.com</a>
                <br>
				<a href="#"><i class="fab fa-facebook"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin"></i></a>
			</div>
		</div>
    </footer>
</body>
</html>