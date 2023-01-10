@extends('layouts.app')
@section('title', 'Contact')
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
                        <li class="category3"><span>Contact Us</span></li>
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
        <div class="area-title" style="margin-top: 0; margin-bottom: 20px">
            <h2>Contact Us</h2>
        </div>
        <!-- contact-details start -->
		<div class="main-contact-area">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="contact-us-area">
							<!-- google-map-area start -->
                            <br>
							<div class="google-map-area">
								<!--  Map Section -->
								<div id="contacts" class="map-area">
									<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15342.932016511892!2d108.24360022623858!3d15.975313552110187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1667799352418!5m2!1svi!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>

							</div>
							<!-- google-map-area end -->
							<!-- contact us form start -->
							<div class="contact-us-form">
								<div class="sec-heading-area">
									<h2>Contact US</h2>
								</div>
								<div class="contact-form">
									<span class="legend">Contact Information</span>
									<form action="#" method="post">
                                        @csrf
										<div class="form-top">
											<div class="form-group col-sm-12">
												<label>Full Name <sup>*</sup></label>
												<input type="text" class="form-control" name="c_name" required>
											</div>
											<div class="form-group col-sm-6">
												<label>Email <sup>*</sup></label>
												<input type="email" class="form-control" name="c_email" required>
											</div>		
											<div class="form-group col-sm-6">
												<label>Subject <sup>*</sup></label>
												<input type="text" class="form-control" name="c_title" required>
											</div>	
											<div class="form-group col-sm-12">
												<label>Comment <sup>*</sup></label>
												<textarea class="yourmessage" name="c_content" required></textarea>
											</div>												
										</div>
										<div class="submit-form form-group col-sm-12 submit-review">
											<button type="submit" class="btn btn-success">Submit</button>
										</div>
									</form>
								</div>
							</div>
							<!-- contact us form end -->
						</div>					
					</div>
				</div>
			</div>	
		</div>
		<!-- contact-details end -->
    </div>
</div>
@stop