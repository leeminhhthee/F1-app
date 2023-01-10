@extends('layouts.app')
@section('title', 'Registration')
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
                        <li class="category3"><span>Registration</span></li>
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
                <div class="customer-register my-account">
                    <form method="post" class="register" action="">
                        @csrf
                        <div class="form-fields">
                            <h2>Register</h2>
                            <p class="form-row form-row-wide">
                                <label for="email">Full name <span class="required">*</span></label>
                                <input type="text" class="input-text" name="name" id="name" value="">
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="email">Email address <span class="required">*</span></label>
                                <input type="email" class="input-text" name="email" id="email" value="">
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="phone">Phone number <span class="required">*</span></label>
                                <input type="text" class="input-text" name="phone" id="phone" value="">
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="password">Password <span class="required">*</span></label>
                                <input type="password" class="input-text" name="password" id="password">
                            </p>
                        </div>
                        <div class="form-action">
                            <div class="actions-log">
                                <input type="submit" class="button" name="register" value="Register">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- account-details Area end -->
        </div>
    </div>
</div>
<!-- account-details Area end -->
@stop