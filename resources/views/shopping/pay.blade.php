@extends('layouts.app')
@section('title', 'Payment')
@section('content')
<!-- breadcrumbs area start -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="{{ route('home') }}">Home</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="home">
                            <a href="{{ route('get.list.shopping.cart') }}">Shopping Cart</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Check out</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- Shopping Table Container -->
<div class="cart-area-start">
    <div class="container wrapper">
        <div class="area-title" style="margin-top: 0; margin-bottom: 20px">
            <h2>Check Out</h2>
        </div>
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="">
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="afix-1" href="{{ route('get.list.shopping.cart') }}">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                            @foreach ($products as $product)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{{ asset(pare_url_file($product->options->avatar)) }}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{ $product->name }}</div>
                                    <div class="col-xs-12"><small>Quantity: {{ $product->qty }}</small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6> {{ number_format($product->price,0,',','.').' VND' }}</h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>                 
                            @endforeach
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"> {{ Cart::subtotal(0,3) }} VND</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Customer information</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="email_address" class="form-control" value="{{ get_data_user('web','email') }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="phone" class="form-control" value="{{ get_data_user('web','phone') }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Notes for order:</strong></div>
                                <div class="col-md-12">
                                    <textarea name="note" class="form-control" cols="30" rows="4" placeholder="Note for this order..."></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Submit Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                </div>
            
            </form>
        </div>
        <div class="row cart-footer">
    
        </div>
    </div>
</div>
@stop