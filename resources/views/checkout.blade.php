@php 
                        use App\Models\cart;
    use Illuminate\Support\Facades\Auth;
    $total_products = 0;
    if (Auth::check()) {
        $total_products = cart::where('user_id', Auth::id())->count();
    }
    // select all row in the Cart and display it in the cart icon in the header section

@endphp

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>
        GenzKicks
    </title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="/frontend/css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="/frontend/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="/frontend/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span>
                        GenzKicks
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">
                        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('shop', 'product.detail') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('why') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('why') }}">Why Us</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('testimonial') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('testimonial') }}">Testimonial</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                    <div class="user_option">
                        @if(Auth::check())
                            <span class="welcome-pill">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                Welcome, <strong>{{ Auth::user()->name }}</strong>
                            </span>
                            <span class="logout-slot">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" class="chip-link"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Log Out</span></button>
                                </form>
                            </span>
                        @else
                            <a href="{{ route('login') }}" class="chip-link">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                <span>
                                    Login
                                </span>
                            </a>
                            <a href="{{ route('register') }}" class="chip-link">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                <span>
                                    Register
                                </span>
                            </a>
                        @endif
                        <a href="{{ route('cart_table') }}" class="chip-link cart-link">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="cart-badge">
                                {{ $total_products }}
                            </span>
                        </a>
                        <form class="form-inline ">
                            <button class="btn nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <!-- end hero area -->

    <div class="container mt-5">
        <h2>Checkout</h2>

        <form action="" method="post">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <h4>Shipping Details</h4>

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="4" required></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <h4>Order Summary</h4>

                    <div class="table-card">
                    <table class="table">
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>

                        @php
                          $grand_total = 0;
                        @endphp
                        @foreach($cart as $item)
                            @php
                              
                                $product = \App\Models\Product::find($item->product_id);
                                $total = $product->Price * $item->quantity;
                                $grand_total += $total;
                            @endphp
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rs.{{ $total }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Grand Total</th>
                            <th>Rs.{{ $grand_total }} </th>
                        </tr>
                    </table>
                    </div>

                    <h4>Payment Method</h4>
                    <div class="form-group">
                        <input type="radio" name="payment_method" value="cod" id="pm_cod" required>
                        <label for="pm_cod">Cash on Delivery (COD)</label><br>

                        <input type="radio" name="payment_method" value="esewa" id="pm_esewa">
                        <label for="pm_esewa">eSewa</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Place Order</button>
                </div>
            </div>
        </form>
    </div>

    <br><br><br>

    <!-- info section -->

    <section class="info_section  layout_padding2-top">
        <div class="social_container">
            <div class="social_box">
                <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="info_container ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            ABOUT US
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="info_form ">
                            <h5>
                                Newsletter
                            </h5>
                            <form action="#">
                                <input type="email" placeholder="Enter your email">
                                <button>
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            NEED HELP
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            CONTACT US
                        </h6>
                        <div class="info_link-box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span> Gb road 123 london Uk </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>+01 12345678901</span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span> demo@gmail.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer section -->
        <footer class=" footer_section">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href="https://html.design/">Web Tech Knowledge</a>
                </p>
            </div>
        </footer>
        <!-- footer section -->

    </section>

    <!-- end info section -->


    <script src="frontend/js/jquery-3.4.1.min.js"></script>
    <script src="frontend/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="frontend/js/custom.js"></script>

</body>

</html>