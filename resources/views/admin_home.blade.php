<!DOCTYPE html>
<head>
    <title>Admin Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    
    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
    
    <link rel="stylesheet" href="{{asset('public/backend/css/style_backend.css')}}">
    
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
    
    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
    
</head>
<body style="background: url({{asset('public/backend/images/bg1.jpg')}})">
    <section id="container">
        <header class="header fixed-top clearfix">
            <div class="brand">
                <a href="index.html" class="logo">
                    ADMIN
                </a>
            </div>

            <div class="top-nav" style="margin-right: 50px">
                <ul class="nav pull-right top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username">{{$data->name}}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended">
                            <li><a href="admin"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <aside>
            <div id="sidebar" class="nav-collapse">
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        
                        <li class="sub-menu">
                            <a href="">
                                <i class="fa fa-book"></i>
                                <span>Danh Mục Sản Phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add_category_product')}}">Thêm danh mục sản phẩm</a></li>
                                <li><a href="{{URL::to('/list_category_product')}}">Liệt kê danh mục sản phẩm</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="">
                                <i class="fa fa-book"></i>
                                <span>Thương Hiệu Sản Phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add_brand_product')}}">Thêm thương hiệu sản phẩm</a></li>
                                <li><a href="{{URL::to('/list_brand_product')}}">Liệt kê thương hiệu sản phẩm</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="">
                                <i class="fa fa-book"></i>
                                <span>Sản Phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add_product')}}">Thêm sản phẩm</a></li>
                                <li><a href="{{URL::to('/list_product')}}">Liệt kê sản phẩm</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="">
                                <i class="fa fa-book"></i>
                                <span>Đơn Hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/order_manager')}}">Quản lý đơn hàng</a></li>
                            </ul>
                        </li>
                    </ul>            
                </div>
            </div>
        </aside>
        <section id="main-content">
            <section class="wrapper">
                @yield('admin_content')
                {{-- <h3>Chào Mừng Bạn Đến Với Trang A!</h3> --}}
            </section>
            <div class="footer" style="width:36cm">
                <div class="wthree-copyright">
                    <p>© 2023 Thế Giới LapTop</p>
                </div>
            </div>
        </section>
    </section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
</body>
</html>
