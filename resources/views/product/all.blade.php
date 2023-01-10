@extends('layouts.app')
@section('title', 'All Products')
@section('content')
<style>
	.pro-rating .active {
		color: #ff9705 !important;
	}
	.sidebar-content .active {
		color: #c2a476;
	}
</style>
    <!-- category-banner area start -->
		<div class="category-banner" style="background-image: url({{ asset('main_img_cate/banner2.jpg') }})">
			<div class="cat-heading">
				<span style="font-size: 35px; color: black; background-color: white; border-radius: 10px; border-color: white;">All Products</span>
			</div>
		</div>
		<!-- category-banner area end -->
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
								<li class="category3"><span>All products</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- shop-with-sidebar Start -->
		<div class="shop-with-sidebar">
			<div class="container">
				<div class="row">

					<!-- left sidebar start -->
					<div class="col-md-3 col-sm-12 col-xs-12 text-left">
						<div class="topbar-left">
							<aside class="widge-topbar">
								<div class="bar-title">
									<div class="bar-ping"><img src="{{ asset('img/bar-ping.png') }}" alt=""></div>
									<h2>Shop by</h2>
								</div>
							</aside>
							<aside class="sidebar-content">
								<div class="tpbr-title sidebar-title col-md-12 nopadding">
									<h6>Filter by price</h6>
								</div>
								<ul>
									<li><a class="{{ Request::get('price') == 0 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 0]) }}" selected="selected">Default</a></li>
									<li><a class="{{ Request::get('price') == 1 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 1]) }}">Under 1.000.000 VND</a></li>
									<li><a class="{{ Request::get('price') == 2 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 2]) }}">1.000.000 - 5.000.000 VND</a></li>
									<li><a class="{{ Request::get('price') == 3 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 3]) }}">5.000.000 - 10.000.000 VND</a></li>
									<li><a class="{{ Request::get('price') == 4 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 4]) }}">10.000.000 - 20.000.000 VND</a></li>
									<li><a class="{{ Request::get('price') == 5 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 5]) }}">20.000.000 - 30.000.000 VND</a></li>
									<li><a class="{{ Request::get('price') == 6 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 6]) }}">Over 30.000.000 VND</a></li>
								</ul>
							</aside>
							
							<aside class="widge-topbar">
								<div class="bar-title">
									<div class="bar-ping"><img src="{{ asset('img/bar-ping.png') }}" alt=""></div>
									<h2>Popular Tags</h2>
								</div>
								<div class="exp-tags">
									<div class="tags">
										<a href="{{ request()->fullUrlWithQuery(['k' => 'apple']) }}">Apple</a>
										<a href="{{ request()->fullUrlWithQuery(['k' => 'amazfit']) }}">Amazfit</a>
										<a href="{{ request()->fullUrlWithQuery(['k' => 'samsung']) }}">SamSung</a>
										<a href="{{ request()->fullUrlWithQuery(['k' => '44mm']) }}">44mm</a>
										<a href="{{ request()->fullUrlWithQuery(['k' => 'đen']) }}">Đen</a>
										<a href="{{ request()->fullUrlWithQuery(['k' => 'xám']) }}">Xám</a>
									</div>
								</div>
							</aside>
						</div>
					</div>
					<!-- left sidebar end -->

					<!-- right sidebar start -->
					<div class="col-md-9 col-sm-12 col-xs-12">

						<!-- shop toolbar start -->
						<div class="shop-content-area">
							<div class="shop-toolbar">
								<div class="col-md-4 col-sm-4 col-xs-12 nopadding-left text-left">
									<form class="tree-most" method="get" id="form_order">
										<div class="orderby-wrapper">
											<label>Sort By</label>
											<select name="orderby" class="orderby">
												<option {{ Request::get('orderby') == "md" || !Request::get('orderby') ? "selected='selected'" : " " }} value="md" selected="selected">Default sorting</option>
												<option {{ Request::get('orderby') == "desc" ? "selected='selected'" : " " }} value="desc">Sort by newness</option>	
												<option {{ Request::get('orderby') == "asc" ? "selected='selected'" : " " }} value="asc">Sort by oldest</option>
												<option {{ Request::get('orderby') == "price_max" ? "selected='selected'" : " " }} value="price_max">Sort by price: low to high</option>
												<option {{ Request::get('orderby') == "price_min" ? "selected='selected'" : " " }} value="price_min">Sort by price: high to low</option>
											</select>
										</div>
									</form>
								</div>
								<div class="col-md-4 col-sm-4 none-xs text-center"></div>
								<div class="col-md-4 col-sm-4 col-xs-12 nopadding-right text-right">
									<div class="view-mode">
										<label>View on</label>
										<ul>
											<li class="active"><a href="#shop-grid-tab" data-toggle="tab"><i class="fa fa-th"></i></a></li>
											<li class=""><a href="#shop-list-tab" data-toggle="tab" ><i class="fa fa-th-list"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- shop toolbar end -->

						<!-- product-row start -->
						<div class="tab-content">

                            <!-- grid view -->
							<div class="tab-pane fade in active" id="shop-grid-tab">
								<div class="row">
                                    @if (asset($allProduct))    
									<div class="shop-product-tab first-sale">
                                        @foreach ($allProduct as $product)
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="two-product">
                                                <!-- single-product start -->
												<div class="single-product" style="width: 265px">
													<div class="product-img">
														@if ($product->pro_number == 0)
                                                            <span style="position: absolute;background: #e91e63; color: white; padding: 2px 6px; border-radius: 5px;font-size: 10px">Temporarily out of stock</span>
                                                        @else
                                                            @if ($product->pro_sale > 0)
                                                            <span style="right: 0;position: absolute;background-image: linear-gradient(-99deg,#ec1f1f 0%,#ff9c00 100%); padding: 1px 7px; border-radius: 10px;color: white;font-size: 13px">Sale {{ $product->pro_sale }}%</span>
                                                            @endif
                                                        @endif
														<a href="{{ route('get.detail.product', [$product->pro_slug, $product->id]) }}">
															<img class="primary-image" id="zoom1" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" style="height: 265px; width: 265px; object-fit: cover;"/>
															<img class="secondary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt=""  style = "height: 265px; width: 265px;object-fit: cover;-moz-transform: scaleX(-1);-o-transform: scaleX(-1);-webkit-transform: scaleX(-1);transform: scaleX(-1);
                                                            filter: FlipH;-ms-filter: FlipH; "  />
														</a>
														<div class="action-zoom">
															<div class="add-to-cart">
																<a href="{{ route('get.detail.product', [$product->pro_slug, $product->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
															</div>
                                                            <div class="add-to-cart">
                                                                <a href="{{ route('add.shopping.cart', $product->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                            </div>	
														</div>
														<div class="price-box">
															<span class="new-price">{{ number_format($product->pro_price,'0','','.',).' VND' }}</span>
														</div>
													</div>
													<div class="product-content">
														<h2 class="product-name" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: 250px;"><a href="#">{{ $product->pro_name }}</a></h2>
														<p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 2;  /* số dòng hiển thị */
														-webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;">{{ $product->pro_description }}</p>
													</div>
												</div>
												<!-- single-product end -->
											</div>
										</div>
                                        @endforeach
									</div>
                                    @endif
								</div>
								<!-- product-row end -->
							</div>
                            <!-- end grid view -->

							<!-- list view -->
							<div class="tab-pane fade" id="shop-list-tab">
								@if (asset($allProduct))    
								<div class="list-view">
									@foreach ($allProduct as $product)
									<!-- single-product start -->
									<div class="product-list-wrapper">
										<div class="single-product">								
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="product-img">
													<a href="{{ route('get.detail.product', [$product->pro_slug, $product->id]) }}">
														<img class="primary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" />
														<img class="secondary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt=""  style = "-moz-transform: scaleX(-1);-o-transform: scaleX(-1);-webkit-transform: scaleX(-1);transform: scaleX(-1);
                                                            filter: FlipH;-ms-filter: "FlipH" />
													</a>
												</div>								
											</div>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<div class="product-content">
													<h2 class="product-name"><a href="{{ route('get.detail.product', [$product->pro_slug, $product->id]) }}">{{ $product->pro_name }}</a></h2>
													<div class="rating-price">	
														<?php 
															$age = 0;
															if ($product->pro_total_rating > 0)
															$age = round($product->pro_total_number / $product->pro_total_rating,2)
														?>
														<div class="pro-rating">
															@for ($i = 1;$i <= 5; $i++)
															<a href="#"><i class="fa fa-star {{ $i <= $age ? 'active' : '' }}" style="color: #999"></i></a>
															@endfor
														</div>
														<div class="price-boxes">
															<span class="new-price">{{ number_format($product->pro_price,'0','','.',).' VND' }}</span>
														</div>
													</div>
													<div class="product-desc">
														<p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 3; 
														-webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;">{{ $product->pro_description }}</p>
													</div>
													<div class="actions-e">
														<div class="action-buttons">
															<div class="add-to-cart">
																<a href="{{ route('add.shopping.cart', $product->id) }}">Add to cart</a>
															</div>
															<div class="add-to-links">
																<div class="add-to-wishlist">
																	<a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
																</div>
																<div class="compare-button">
																	<a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
																</div>									
															</div>
														</div>
													</div>										
												</div>									
											</div>
										</div>
									</div>
									@endforeach
									<!-- single-product end -->	
								</div>
								@endif
							</div>

							<!-- shop toolbar start -->
							<div class="shop-content-bottom">
								<div class="shop-toolbar btn-tlbr">
									<div class="col-md-4 col-sm-4 col-xs-12 nopadding-right text-right"></div>
									<div class="col-md-4 col-sm-4 col-xs-12 text-center">
										<div class="pages">
											{!! $allProduct->appends($query)->links() !!}
											{{-- <ul>
												<li class="current">1</li>
												<li><a href="#">2</a></li>
												<li><a href="#" class="next i-next" title="Next"><i class="fa fa-arrow-right"></i></a></li>
											</ul> --}}
										</div>
									</div>
								</div>
							</div>
							<!-- shop toolbar end -->

						</div>
					</div>
					<!-- right sidebar end -->
				</div>
			</div>
		</div>
@stop

@section('script')
<script>
	$(function(){
		$('.orderby').change(function(){
			$("#form_order").submit();
		})
	});
</script>
@stop