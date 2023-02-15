<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang Chủ</title>
    <link href="public/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/frontend/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <div class="p-3">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div>
							<a href="#"><img src="public/frontend/images/logo.jpg" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div style="font-size: 20px">
							<ul class="nav justify-content-end">
								<li><a href="cart.html" class="text-dark"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<li><a href="login" class="text-dark"><i class="fa fa-lock"></i> Đăng nhập</a></li>
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
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    &nbsp;
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Shop Products
                      </a>
                      <div class="dropdown-menu bg-secondary" style="font-size: 25px" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Products</a>
                        <a class="dropdown-item" href="#">Product Details</a>
                      </div>
                    </li>
                    &nbsp;
                    <li class="nav-item">
                      <a class="nav-link" href="#">Contact</a>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" style="height: 30px; font-size: 15px" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success pb-4" style="height: 30px; font-size: 16px" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </nav>
        </div>
    </header>

    <section>
        <div class="container">
            <h1 style="font-size: 45px" class="text-center text-warning">Thế Giới Laptop</h1>
            <hr size="10px">
            <div class="row">
                <div class="col-sm-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="color:blue">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="col-sm-4" style="text-align: center; padding-top: 5cm">
                                   <h1 style="font-size: 40px"><b>Laptop MACBOOK</b></h1>
                                   <p style="font-size: 15px">Thương hiệu HP là một hãng máy tính tiếng tăm đến từ đất nước cờ hoa (Mỹ), hãng HP được thành lập vào năm 1939. Đây là một trong những thương hiệu máy tính laptop hàng đầu trên thế giới với rất nhiều dòng máy khác nhau cho người dùng lựa chọn. Máy tính HP được trải đều ở nhiều phân khúc giá từ bình dân giá rẻ cho đến cao cấp và đáp ứng được mọi nhu cầu sử dụng khác nhau.</p>
                                </div>
                                <div class="col-sm-8">
                                    <img class="d-block" src="public/frontend/images/laptop-macbook.png" alt="First slide">
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="col-sm-4" style="text-align: center; padding-top: 5cm">
                                   <h1 style="font-size: 40px"><b>Laptop HP</b></h1>
                                   <p style="font-size: 15px">Thương hiệu HP là một hãng máy tính tiếng tăm đến từ đất nước cờ hoa (Mỹ), hãng HP được thành lập vào năm 1939. Đây là một trong những thương hiệu máy tính laptop hàng đầu trên thế giới với rất nhiều dòng máy khác nhau cho người dùng lựa chọn. Máy tính HP được trải đều ở nhiều phân khúc giá từ bình dân giá rẻ cho đến cao cấp và đáp ứng được mọi nhu cầu sử dụng khác nhau.</p>
                                </div>
                                <div class="col-sm-8">
                                    <img class="d-block" src="public/frontend/images/laptop-hp.jpg" alt="Second slide">
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="col-sm-4" style="text-align: center; padding-top: 5cm">
                                   <h1 style="font-size: 40px"><b>Laptop DELL</b></h1>
                                   <p style="font-size: 15px">Dell Inc là một công ty đa quốc gia của Mỹ, được thành lập vào năm 1984 do Michael Dell sáng lập có trụ sở tại Round Rock, Texas, Mỹ. Không những vậy, Dell Inc là công ty có thu nhập đứng thứ 28 tại Mỹ. Hiện nay, Laptop đến từ thương hiệu công nghệ nổi tiếng Dell có các dòng chính hướng đến mọi đối tượng khách hàng: Inspiron, Vostro, XPS, Alienware, Latitude, Precision.</p>
                                </div>
                                <div class="col-sm-8">
                                    <img class="d-block" src="public/frontend/images/laptop-dell.jpg" alt="Third slide">
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon bg-secondary" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon bg-secondary" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                     </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container text-center">
        <h1 style="font-size: 40px">Thế Giới Laptop - nơi có nhiều sản phẩm chính hãng</h1>
        <p style="font-size: 20px">Thế Giới Laptop mang đến nhiều sản phẩm uy tín, chất lượng, đảm bảo phù hợp với nhu cầu của khách hàng. Bên cạnh đó, shop có các sản phẩm giá cả phải chăng, shop rất hân hạnh được phục vụ quý khách.</p>
        <h2 style="font-size: 30px" class="text-danger pb-5">Cảm ơn bạn đã tin tưởng và lựa chọn sản phẩm của Thế Giới Laptop!!!</h2>
    </div>

    <footer>
        <div class="container">
			<div style="font-size: 20px; background-color: lightgrey; text-align: center">
				<a href="#"><i class="fa fa-phone"></i> +18007061</a>
                <br>
                <a href="#"><i class="fa fa-envelope"></i> shopbanhang@gmail.com</a>
                <br>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
			</div>
		</div>
    </footer>
</body>
</html>