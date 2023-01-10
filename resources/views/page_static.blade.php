@extends('layouts.app')
@section('content')
<!-- breadcrumbs area start -->
@if (isset($page))
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
                        <li class="category3"><span>{{ $page->ps_type }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- Shopping Table Container -->
<div class="cart-area-start">
    <div class="container">
        <!-- contact-details start -->
		<div class="main-contact-area">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="contact-us-area">
							<h2>{{ isset($page) ? $page->ps_name : 'Dang cap nhat' }}</h2>
                            <div>
                                {!! isset($page) ? $page->ps_content : 'Dang cap nhat' !!}
                            </div>
						</div>					
					</div>
				</div>
			</div>	
		</div>
		<!-- contact-details end -->
    </div>
</div>
@else 
    <center><h2 style="padding-top: 100px; color: red"><i>Sorry, Page does not exist :(((</i></h2></center>
@endif
@stop