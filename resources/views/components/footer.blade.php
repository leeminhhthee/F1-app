<footer>
    <!-- Brand Logo Area Start -->
    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="brand-carousel">
                    @foreach ($categories as $category)
                        @if($category->c_avatar)
                        <div class="brand-item"><a href="{{ route('get.list.product', [$category->c_slug, $category->id]) }}"><img src="{{ asset(pare_url_file($category->c_avatar)) }}" alt="" /></a></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Area End -->
    <div class="top-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="single-snap-footer">
                        <div class="snap-footer-title">
                            <h4>Vietnam-Korea University</h4>
                        </div>
                        <div class="cakewalk-footer-content">
                            <p class="footer-des">Vietnam - Korea University of ICT is an institution of training, scientific research, 
                                technology transfer, serving the large and prestigious community of the country in the fields of 
                                information technology, communication and digital economy...</p>
                            <a href="https://vku.udn.vn/" target="_blank" class="read-more">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="single-snap-footer">
                        <div class="snap-footer-title">
                            <h4>Information</h4>
                        </div>
                        <div class="cakewalk-footer-content">
                            <ul>
                                @foreach ($pages as $page)
                                <li><a href="{{ route('get.page_static', [$page->ps_type_slug]) }}" target="_blank">{{ $page->ps_type }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="single-snap-footer">
                        <div class="snap-footer-title">
                            <h4>YOUR ACCOUNT</h4>
                        </div>
                        <div class="cakewalk-footer-content">
                            <ul>
                                @if (Auth::check())
                                    <li><a href="{{ route('user.dashboard') }}">My Account</a></li>
                                @else 
                                    <li><a href="{{ route('get.login') }}">Login</a></li>
                                @endif
                                <li><a href="{{ route('get.list.shopping.cart') }}">My Cart</a></li>
                                <li><a href="{{ route('get.form.pay') }}">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="single-snap-footer">
                        <div class="snap-footer-title">
                            <h4>Another Information</h4>
                        </div>
                        <div class="cakewalk-footer-content">
                            <ul>
                                <li><a href="#">LE MINH THE</a></li>
                                <li><a href="#">TRUONG BA VUONG</a></li>
                                <li><a href="#">TON THAT RON</a></li>
                                <li><a href="#">21GIT</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 hidden-sm">
                    <div class="single-snap-footer">
                        <div class="snap-footer-title">
                            <h4>Follow Us</h4>
                        </div>
                        <div class="cakewalk-footer-content social-footer">
                            <ul>
                                <li><a href="https://www.facebook.com/lmtther.13" target="_blank"><i class="fa fa-facebook"></i></a><span> Facebook</span></li>
                                <li><a href="https://vku.udn.vn/" target="_blank"><i class="fa fa-google"></i></a><span> Google</span></li>
                                <li><a href="https://www.instagram.com/lmtther.13/  " target="_blank"><i class="fa fa-instagram"></i></a><span> Instagram</span></li>
                                <li><a href="https://www.youtube.com/channel/UCNHj5P5y48W7GcYK3L-2_DA" target="_blank"><i class="fa fa-youtube-play"></i></a><span> Youtube</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- info footer start -->
    <div class="info-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="info-fcontainer">
                        <div class="infof-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="infof-content">
                            <h3>Our Address</h3>
                            <p>470 Tran Dai Nghia, Da Nang City</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="info-fcontainer">
                        <div class="infof-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="infof-content">
                            <h3>Phone Support</h3>
                            <p>097 464 9644</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="info-fcontainer">
                        <div class="infof-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="infof-content">
                            <h3>Email Support</h3>
                            <p>thelm.21it@vku.udn.vn</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm">
                    <div class="info-fcontainer">
                        <div class="infof-icon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="infof-content">
                            <h3>Openning Hour</h3>
                            <p>Sat - Thu : 7:30 am - 22:00 pm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- info footer end -->
    <!-- footer address area start -->
    <div class="address-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <address>Copyright © <a href="http://vku.udn.vn" target="_blank"> Vietnam - Korea University</a> - UDN.</address>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="footer-payment pull-right">
                        <a href=""><img src="{{ asset('img/payment.png') }}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer address area end -->
</footer>
