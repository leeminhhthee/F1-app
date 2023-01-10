
<?php $__env->startSection('title', 'Product Detail'); ?>
<?php $__env->startSection('content'); ?>
<style>
	.product-tab-content
	{
		overflow: hidden;
	}
	.product-content h1{ font-size: 22px !important}
	.product-tab-content h1{ font-size: 22px !important}
	.product-tab-content h2{ font-size: 20px !important}
	.product-tab-content h3{ font-size: 18px !important}
	.product-tab-content h4{ font-size: 16px !important}
	.product-tab-content img{
		margin: 0 auto;
		text-align: center;
		max-width: 100%;
		display: block;
	}
	.list_start i:hover{
		cursor: pointer;
	}
	.list_text{
		display: inline-block;
		margin-left: 10px;
		position: relative;
		background: #52b858;
		color: white;
		padding: 2px 8px;
		box-sizing: border-box;
		font-size: 12px;
		border-radius: 2px;
		display: none
	}
	.list_text::after{
		right: 100%;
		top: 50%;
		border: solid transparent;
		content: '';
		height: 0;
		width: 0;
		position: absolute;
		pointer-events: none;
		border-color: rgba(82, 184, 88, 0);
		border-right-color: #52b858;
		border-width: 6px;
		margin-top: -6px;
	}
	.list_start .rating_active{
		color: #ff9705;
	}
	.pro-rating .active {
		color: #ff9705 !important;
	}
	.rating .active{
		color: #ff9705 !important;
	}
</style>
	<?php if(isset($productDetail)): ?>
	<?php $__currentLoopData = $productDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	<!-- breadcrumbs area start -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="container-inner">
							<ul>
								<li class="home">
									<a href="<?php echo e(route('home')); ?>">Home</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="home">
									<a href="<?php echo e(route('get.list.product', [$proDetail->c_slug, $proDetail->c_id])); ?>"><?php echo e($proDetail->c_name); ?></a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span><?php echo e($proDetail->pro_name); ?></span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- product-details Area Start -->
		<div class="product-details-area" id="content_product" data-id="<?php echo e($proDetail->id); ?>" style="padding-bottom: 50px">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-5 col-xs-12">
						<div class="zoomWrapper">
							<div id="img-1" class="zoomWrapper single-zoom">
								<a href="#">
									<img src="<?php echo e(asset(pare_url_file($proDetail->pro_avatar))); ?>" data-zoom-image="<?php echo e(asset(pare_url_file($proDetail->pro_avatar))); ?>" alt="big-1">
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="product-list-wrapper">
							<div class="single-product">
								<div class="product-content">
									<h1 class="product-name"><?php echo e($proDetail->pro_name); ?></h1>
									<div class="rating-price">	
										<?php 
											$ageDetail = 0;
											if ($proDetail->pro_total_rating > 0)
												$ageDetail = round($proDetail->pro_total_number / $proDetail->pro_total_rating,2)
										?>
										<div class="pro-rating">
											<?php for($i = 1;$i <= 5; $i++): ?>
											<a href="#"><i class="fa fa-star <?php echo e($i <= $ageDetail ? 'active' : ''); ?>" style="color: #999"></i></a>
											<?php endfor; ?>
										</div>
										<div class="price-boxes">
											<?php if( $proDetail->pro_sale  == 0 ): ?>
											<span class="new-price"><?php echo e(number_format($proDetail->pro_price,0,',','.').' VND'); ?></span><br>
											<?php else: ?>
											<span class="new-price" style="font-size: 17px"><i><del><?php echo e(number_format($proDetail->pro_price,0,',','.').' VND'); ?></del></i></span><br>
											<span class="new-price" style="color: red">Sale off <?php echo e($proDetail->pro_sale); ?> % </span><i class="fa fa-arrow-right"></i>
											<span class="new-price"> <?php echo e(number_format($proDetail->pro_price*(100 - $proDetail->pro_sale)/100,0,',','.').' VND'); ?></span><br>
											<?php endif; ?>
										</div>
									</div>
									<div class="product-desc">
										<?php echo $proDetail->pro_description; ?>

									</div><br>
									<div class="actions-e">
										<div class="action-buttons-single">
											<div class="add-to-cart">
												<a href="<?php echo e(route('add.shopping.cart', $proDetail->id)); ?>">Add to cart</a>
											</div>
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>								
											</div>
										</div>
									</div>
									<div class="singl-share">
                                        <a href="#"><img src="<?php echo e(asset('img/single-share.png')); ?>" alt=""></a>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="single-product-tab">
						  <!-- Nav tabs -->
						<ul class="details-tab">
							<li class="active"><a href="#home" data-toggle="tab">Description</a></li>
							<li class=""><a href="#messages" data-toggle="tab"> Review</a></li>
						</ul>
						  <!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="product-tab-content">
									<br>
									<?php echo $proDetail->pro_content; ?>

								</div>
							</div>
							<div role="tabpanel" class="tab-pane componet_rating col-md-offset-1" id="messages" style="margin-bottom: 20px">
								<h3 class="comment-reply-title">REVIEWS FOR <?php echo e($proDetail->pro_name); ?></h3>
								<div class="componet_rating_content" style="margin-bottom: 20px;display: flex; align-items: center;border-radius: 5px; border: 1px solid #dedede">
									<div class="rating_item" style="width: 20%; position: relative;">
										<span class="fa fa-star" style="font-size: 100px; color: #fe8c23;display: block;
										margin: 0 auto; text-align: center"></span>
										<b style="position: absolute; top: 50%; left: 50%;transform: translateX(-50%) translateY(-50%); color: white;font-size: 20px"><?php echo e($ageDetail); ?></b>
									</div>
									<div class="list_rating" style="width: 60%; padding: 20px">
										<?php $__currentLoopData = $arrayRatings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $arrayRating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php 
											$itemAge = round(($arrayRating['total'] / $proDetail->pro_total_rating) * 100,1);
										?>
											<div class="item_rating" style="display:flex"; align-items: center>
												<div style="width: 10%">
													<?php echo e($key); ?> <span style="font-size: 14px" class="fa fa-star"></span>
												</div>
												<div style="width: 70%; margin: 0 20px; ">
													<span style="width: 100%;height: 8px;display: block;border: 1px solid #dedede;border-radius: 5px; background-color: #dedede">
														<b style="width: <?php echo e($itemAge); ?>%; background-color: #f25800; display: block;border-radius: 5px; height: 100%"></b>
													</span>
												</div>
												<div style="width: 20%">
													<a href=""> <?php echo e($arrayRating['total']); ?> review (<?php echo e($itemAge); ?> %)</a>
												</div>
											</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
									<div style="width: 20%">
										<a href="" class="js_rating_action" style="width: 200px; background: #288ad6;padding: 10px; color: white;border-radius: 5px">Send your review</a>
									</div>
								</div>

								<div class="comments-area">
									<?php if(isset($ratings)): ?>
									<div class="comments-list">
										<?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php 
											$age = $rating->ra_number
										?>
										<ul>
											<li>
												<div class="comments-details">
													<div class="comments-list-img">
														<img src="<?php echo e(isset($rating->avatar) ? asset(pare_url_file($rating->avatar)): '[N\A]'); ?>" alt="">
													</div>
													<div class="comments-content-wrap" style="margin:0">
														<span>
															<b style="font-size: 16px"><a href="#"><?php echo e($rating->name); ?> - </a></b>
															<span class="post-time"><?php echo e($rating->created_at); ?> &nbsp;
																<?php if($check == 1): ?>
																<span class="check" style="font-size: 10px; color: green">
																	<i class="fa fa-check-circle fa-2x"></i> Purchased at the Website.
																</span>
																<?php endif; ?>
															</span><br>
															&nbsp;
															<span class="rating">
																<?php for($i = 1;$i <= 5; $i++): ?>
																   <i class="fa fa-star <?php echo e($i <= $age ? 'active' : ''); ?>" style="color: #999"></i>
																<?php endfor; ?>
															 </span>
														</span>
														<p style="font-size: 15px">&nbsp;&nbsp;<?php echo e($rating->ra_content); ?></p>
													</div>
												</div>
											</li>									
										</ul>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
									<?php endif; ?>
								</div>

								<?php 
								$listRatingText = [
									1 => 'Bad',
									2 => 'Very bad',
									3 => 'Normal',
									4 => 'Good',
									5 => 'Very good'
								];
								?>
								<div class="form_rating hide">
									<div class="col-md-offset-1" style="display: flex; margin-top:15px; font-size: 15px">
										<p style="margin-bottom: 0">
											Your review <?php if(!get_data_user('web')): ?> <b style="color: red">*</b><i style="font-size: 10px; color: rgb(214, 13, 13)">(You need to log in to post a review.)</i> <?php endif; ?>
										</p>		
										<span style="margin: 0 15px" class="list_start">
											<?php for($i = 1; $i <= 5; $i++): ?>
												<i class="fa fa-star" data-key="<?php echo e($i); ?>"></i>
											<?php endfor; ?>
										</span>
										<span class="list_text"></span>
										<input type="hidden" name="" value="" class="number_rating">
									</div>
									<div class="col-md-offset-1" style="margin-top: 15px">
										<textarea class="form-control" name="" id="ra_content" cols="30" rows="3"></textarea>
									</div>
									<div class="col-md-offset-1" style="margin-top: 15px">
										<?php if(!get_data_user('web')): ?>
										<a href="<?php echo e(route('post.rating.product', $proDetail->id)); ?>" 
											onclick="return alert('Bạn cần đăng nhập để gửi nhận xét!')"
											class="js_rating_product" style="width: 200px; background: #288ad6;padding: 5px 10px; color: white;border-radius: 5px">Send the review</a>
										<?php else: ?>
										<a href="<?php echo e(route('post.rating.product', $proDetail->id)); ?>"
											class="js_rating_product" style="width: 200px; background: #288ad6;padding: 5px 10px; color: white;border-radius: 5px">Send the review</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
		<!-- product-details Area end -->
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$(function(){
		let listStart = $(".list_start .fa");

		listRatingText = {
			1 : 'Bad',
			2 : 'Very bad',
			3 : 'Normal',
			4 : 'Good',
			5 : 'Very good'
		};

		listStart.mouseover(function(){
			let $this = $(this);
			let number = $this.attr('data-key');
			listStart.removeClass('rating_active')

			$(".number_rating").val(number);
			$.each(listStart, function(key,value){
				if (key + 1 <= number)
				{
					$(this).addClass('rating_active')
				}
			});
			$(".list_text").text('').text(listRatingText[$this.attr('data-key')]).show();
		});
		
		$(".js_rating_action").click(function(event){
			event.preventDefault();
			
			if ($(".form_rating").hasClass('hide'))
			{
				$(".form_rating").addClass('active').removeClass('hide');
			} else {
				$(".form_rating").addClass('hide').removeClass('active');
			}
		})
		
		$(".js_rating_product").click(function(e){
			event.preventDefault();
			let content = $("#ra_content").val();
			let number = $(".number_rating").val();
			let url = $(this).attr('href');

			if (content && number)
			{
				$.ajax({
					url : url,
					type: 'POST',
					data: {
						number : number,
						r_content : content
					}
				}).done(function(result){
					if (result.code == 1)
					{
						alert("Submit a successful review!");
						location.reload();
					}
				});
			}
		});

		//luu id san pham vao storage
		let idProduct = $("#content_product").attr('data-id');
		//lay gia tri storage
		let products = localStorage.getItem('products');
		
		if (products == null)
		{
			arrayProduct = new Array();
			arrayProduct.push(idProduct);
			localStorage.setItem('products', JSON.stringify(arrayProduct))
		} else {
			//chuyen ve mang
			products = $.parseJSON(products);

			if(products.indexOf(idProduct) == -1)
			{
				products.push(idProduct);
				localStorage.setItem('products', JSON.stringify(products));
			}
			console.log(products);
		}
	});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\F1-app\resources\views/product/detail.blade.php ENDPATH**/ ?>