@extends('layouts.app')

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
                        <li class="category3"><span>Reset Password</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<div class="customer-login-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-offset-2">
                <div class="customer-login my-account">
                    
                    <form method="POST"">
                        @csrf
                        <div class="form-fields">
                            <h2>{{ __('Reset Password') }}</h2>
                            <p class="form-row form-row-wide">
                                <label for="password">New Password <span class="required">*</span></label>
                                <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="confirm_password">Confirm Password <span class="required">*</span></label>
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password" autocomplete="new-password">
                                @if ($errors->has('confirm_password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('confirm_password') }}</strong>
                                </span>
                                @endif
                            </p>
                        </div>
                        <div class="form-action">
                            <div class="actions-log">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
