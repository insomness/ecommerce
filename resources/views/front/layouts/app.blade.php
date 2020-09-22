<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>{{config('app.name')}}</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset('frontTemplate')}}/css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{asset('frontTemplate')}}/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="{{asset('frontTemplate')}}/css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{asset('frontTemplate')}}/css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('frontTemplate')}}/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{asset('frontTemplate')}}/css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-7">
							<div class="">
								<a href="/" class="" >
                                    <h1 style="color: white; margin-top: 11px">{{config('app.name')}}</h1>
								</a>
							</div>
						</div>
						<!-- /LOGO -->


						<!-- ACCOUNT -->
						<div class="col-md-5 ">
							<div class="header-ctn">

                                @auth
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
									</a>
								</div>
                                <!-- /Wishlist -->
                                @endauth

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
                                        <span>Your Cart</span>
                                        @php
                                            $carts = auth()->check() ?  \Cart::session(auth()->user()->id)->getContent() : [];
                                        @endphp
                                        @if ($carts)
										    <div class="qty cartCount">{{$carts->count()}}</div>
                                        @endif
                                    </a>
                                    @auth
									<div class="cart-dropdown">
										<div class="cart-list">
                                            @foreach ($carts as $cart)
											<div class="product-widget"  data-id="{{$cart->id}}">
												<div class="product-img">
													<img src="{{asset('storage/products/thumbnail/' . $cart->associatedModel->image)}}">
												</div>
												<div class="product-body">
                                                    <h3 class="product-name"><a href="#">{{$cart->name}}</a></h3>
													<h4 class="product-price"><span class="qty">{{$cart->quantity}}x</span>Rp. {{number_format($cart->price, null ,',','.')}}</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
                                            @endforeach
										</div>
										<div class="cart-summary">
											<small class="cartCount">{{$carts->count()}} Item(s) selected</small>
											<h5 class="subTotal">SUBTOTAL: Rp. {{number_format(\Cart::session(auth()->user()->id)->getSubTotal(), null ,',','.')}}</h5>
										</div>
										<div class="cart-btns">
											<a href="/carts">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
                                    @endauth
								</div>
                                <!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Hot Deals</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Cameras</a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>
                    <ul class="main-nav nav navbar-nav navbar-right" style="padding-top: 3px;">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-user"></i>
                                <span>{{auth()->check() ? auth()->user()->name : 'Account' }}</span>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            @guest
                                <li><a href="{{route('login')}}" >Login</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>
                            @else
                                <li>
                                    <a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                            </ul>
                        </li>
                    </ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

        @yield('content')

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
        <!-- /FOOTER -->
        <div class="overlay"></div>
		<!-- jQuery Plugins -->
		<script src="{{asset('frontTemplate')}}/js/jquery.min.js"></script>
		<script src="{{asset('frontTemplate')}}/js/bootstrap.min.js"></script>
		<script src="{{asset('frontTemplate')}}/js/slick.min.js"></script>
		<script src="{{asset('frontTemplate')}}/js/nouislider.min.js"></script>
		<script src="{{asset('frontTemplate')}}/js/jquery.zoom.min.js"></script>
        <script src="{{asset('frontTemplate')}}/js/main.js"></script>
        <script src="{{asset('frontTemplate')}}/js/myCart.js"></script>
        @stack('scripts')
	</body>
</html>
