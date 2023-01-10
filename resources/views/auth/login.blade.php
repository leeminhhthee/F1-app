@extends('layouts.app')
@section('title','Login')
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
                        <li class="category3"><span>Login</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->

<!-- account-details Area Start -->
<div class="customer-login-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="customer-login my-account">
                    <form method="post" class="login" action="">
                        @csrf
                        <div class="form-fields">
                            <h2>Login</h2>
                            <p class="form-row form-row-wide">
                                <label for="username">Email address <span class="required">*</span></label>
                                <input type="text" class="input-text" name="email" id="email" value="">
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="password">Password <span class="required">*</span></label>
                                <input class="input-text" type="password" name="password" id="password">
                            </p>
                        </div>
                        <div class="form-action">
                            <p class="lost_password"> <a href="{{ route('get.reset.password') }}">Lost your password?</a></p>
                            <div class="actions-log">
                                <input type="submit" class="button" name="login" value="Login">
                            </div>
                            <label for="rememberme" class="inline"> 
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember me </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- account-details Area end -->
@stop