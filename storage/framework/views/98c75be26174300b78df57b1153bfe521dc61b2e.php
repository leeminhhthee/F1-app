
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>
<style>
    .cat-rating .active
    {
        color: #ff9705 !important;
    }
</style>
<!-- start home slider -->
<div class="slider-area an-1 hm-1">
        <!-- slider -->
    <div class="bend niceties preview-2">
        <div id="ensign-nivoslider" class="slides">	
            <img src="<?php echo e(asset('img/banner1.jpg')); ?>" alt="" title="#slider-direction-1"/>
            <img src="<?php echo e(asset('img/banner2.jpg')); ?>" alt="" title="#slider-direction-2"/>
        </div>
        <!-- direction 1 -->
        <div id="slider-direction-1" class="t-cn slider-direction">
            <div class="slider-content t-cn s-tb slider-1">
                <div class="title-container s-tb-c title-compress">
                    <h2 class="title1">World Cup</h2>
                    <h3 class="title2" >Quatar 2022</h3>
                    <h4 class="title2" >Sale sock...</h4>
                    <a class="btn-title" href="">View more</a>
                </div>
            </div>	
        </div>
        <!-- direction 2 -->
        <div id="slider-direction-2" class="slider-direction">
            <div class="slider-content t-lfl s-tb slider-2 lft-pr">
                <div class="title-container s-tb-c">
                    <h2 class="title1">World Cup</h2>
                    <h3 class="title2" >Quatar 2022</h3>
                    <h4 class="title2" >Sale 50% for all product.</h4>
                    <a class="btn-title" href="">View more</a>
                </div>
            </div>	
        </div>
    </div>
    <!-- slider end-->
</div>
<!-- end home slider -->

<!-- NEW PRODUCT section start -->
<div class="our-product-area new-product">
    <div class="container">
        <div class="area-title">
            <h2>New products</h2>
        </div>
        <!-- our-product area start -->
        <?php if(isset($productHot)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="features-curosel">
                        <!-- single-product start -->
                        <?php $__currentLoopData = $productHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-12 col-md-12">
                            <div class="single-product first-sale">
                                <div class="product-img">
                                    <?php if($hot->pro_number == 0): ?>
                                    <span style="position: absolute;background: #e91e63; color: white; padding: 2px 6px; border-radius: 5px;font-size: 10px">Temporarily out of stock</span>
                                    <?php else: ?>
                                        <?php if($hot->pro_sale > 0): ?>
                                        <span style="right: 0;position: absolute;background-image: linear-gradient(-99deg,#ec1f1f 0%,#ff9c00 100%); padding: 1px 7px; border-radius: 10px;color: white;font-size: 13px">Sale <?php echo e($hot->pro_sale); ?>%</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('get.detail.product', [$hot->pro_slug, $hot->id])); ?>">
                                        <img class="primary-image" src="<?php echo e(pare_url_file($hot->pro_avatar)); ?>" alt="" style="height: 265px; width: 265px; object-fit: contain;"/>
                                        <img class="secondary-image" src="<?php echo e(pare_url_file($hot->pro_avatar)); ?>" alt="" 
                                        style = "height: 265px; width: 265px; object-fit: contain;-moz-transform: scaleX(-1);-o-transform: scaleX(-1);-webkit-transform: scaleX(-1);transform: scaleX(-1);
                                                filter: FlipH;-ms-filter: "FlipH" />
                                    </a>
                                    <div class="action-zoom">
                                        <div class="add-to-cart">
                                            <a href="<?php echo e(route('get.detail.product', [$hot->pro_slug, $hot->id])); ?>" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="<?php echo e(route('add.shopping.cart', $hot->id)); ?>" title="Add to Cart"><i class="icon-bag"></i></a>
                                        </div>	
                                    </div>
                                   <div class="price-box">
                                       <span class="new-price"><?php echo e(number_format($hot->pro_price* (100 - $hot->pro_sale)/100,'0','','.',).' VND'); ?></span>
                                   </div>
                                </div>
                                <div class="product-content">
                                    <h2 class="product-name" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: 250px;"><a href="#"><?php echo e($hot->pro_name); ?></a></h2>
                                    <p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 3;  /* số dòng hiển thị */
                                            -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;"><?php echo e($hot->pro_description); ?></p>
                                </div>
                            </div>
                        </div>   
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- single-product end -->
                    </div>
                </div>	
            </div>
        </div>
        <?php endif; ?>
        <!-- our-product area end -->	
    </div>
</div>
<!-- product section end -->
<?php echo $__env->make('components.product_suggest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- LASTESTPOST area start -->
<div class="latest-post-area">
    <div class="container">
        <div class="area-title">
            <h2>Latest Post</h2>
        </div>
        <?php if(isset($articleNews)): ?>
        <div class="row">
            <div class="all-singlepost">
                <?php $__currentLoopData = $articleNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arNew): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                <!-- single latestpost start -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-post" style="margin-bottom: 30px">
                        <div class="post-thumb">
                            <a href="<?php echo e(route('get.detail.article',[$arNew->a_slug, $arNew->id])); ?>">
                                <img src="<?php echo e(asset(pare_url_file($arNew->a_avater))); ?>" alt="" style="width: 370px; height: 280px;object-fit: cover;" />
                            </a>
                        </div>
                        <div class="post-thumb-info">
                            <div class="post-time">
                                <a href="<?php echo e(route('get.detail.article',[$arNew->a_slug, $arNew->id])); ?>">
                                    <span><?php echo e($arNew->a_name); ?></span>
                                </a>
                            </div>
                            <div class="postexcerpt">
                                <p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 3;  /* số dòng hiển thị */
                                -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;"><?php echo e($arNew->a_description); ?></p>
                                <a href="<?php echo e(route('get.detail.article',[$arNew->a_slug, $arNew->id])); ?>" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single latestpost end -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- latestpost area end -->

<div id="product_view"></div>

<div class="block-category">
    <div class="container">
        <div class="row">
            <?php if(isset($categoriesHome)): ?>
            <?php $__currentLoopData = $categoriesHome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryHome): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- featured block start -->
            <div class="col-md-4">
                <!-- block title start -->
                <div class="block-title">
                    <h2><?php echo e($categoryHome->c_name); ?></h2>
                </div>
                <!-- block title end -->
                <!-- block carousel start -->
                <?php if(isset($categoryHome->products)): ?>
                <div class="block-carousel owl-carousel owl-theme" style="opacity: 1; display: block;">
                    <div class="owl-wrapper-outer">
                        <div class="owl-wrapper" style="width: 2960px; left: 0px; display: block;">
                            <div class="owl-item" style="width: 370px;">
                                <div class="block-content">
                                    <?php 
                                    $temp=0;    
                                    ?>
                                    <?php $__currentLoopData = $categoryHome->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($temp<2): ?>
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="<?php echo e(route('get.detail.product', [$product->pro_slug, $product->id])); ?>"><img src="<?php echo e(asset(pare_url_file($product->pro_avatar))); ?>" style="width: 170px; height: 208px;object-fit: contain;" alt=""></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="<?php echo e(route('get.detail.product', [$product->pro_slug, $product->id])); ?>" style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 3;  /* số dòng hiển thị */
                                                -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;" title="Quick View"><?php echo e($product->pro_name); ?></a></h3>
                                            <p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 3;  /* số dòng hiển thị */
                                            -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;"><?php echo e($product->pro_description); ?></p>
                                            <?php if($product->pro_sale > 0): ?>
                                            <div class="cat-price"><?php echo e(number_format($product->pro_price* (100 - $product->pro_sale)/100,'0','','.',).' VND'); ?> <span class="old-price"><?php echo e(number_format($product->pro_price,'0','','.',).' VND'); ?></span></div>
                                            <?php else: ?>
                                            <div class="cat-price"><?php echo e(number_format($product->pro_price,'0','','.',).' VND'); ?></div>
                                            <?php endif; ?>
                                            <?php 
                                                $age = 0;
                                                if ($product->pro_total_rating > 0)
                                                $age = round($product->pro_total_number / $product->pro_total_rating,2)
                                            ?>
                                            <div class="cat-rating">
                                                <?php for($i = 1;$i <= 5; $i++): ?>
                                                <i class="fa fa-star <?php echo e($i <= $age ? 'active' : ''); ?>" style="color: #999"></i>
                                                <?php endfor; ?>
                                            </div>								
                                        </div>
                                    </div>
                                    <?php $temp = $temp+1 ?>
                                    <?php endif; ?>
                                    <!-- single block end -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                <?php endif; ?>
                <!-- block carousel end -->
            </div>
            <!-- featured block end -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- testimonial area start -->
<div class="testimonial-area lap-ruffel">
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="crusial-carousel">
                   <div class="crusial-content">
                       <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                       <span>BootExperts</span>
                   </div>
                   <div class="crusial-content">
                       <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                       <span>Lavoro Store!</span>
                   </div>
                   <div class="crusial-content">
                       <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                       <span>MR Selim Rana</span>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- testimonial area end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
	    });
        let routeRenderProduct = '<?php echo e(route('post.product.view')); ?>';
        checkRenderProduct = false;
        $(document).on('scroll', function(){
            if ($(window).scrollTop() > 150 && checkRenderProduct == false) {
                checkRenderProduct = true;
                let products = localStorage.getItem('products');
                products = $.parseJSON(products);

                if(products.length > 0)
                {
                    $.ajax({
                        url : routeRenderProduct,
                        method : "POST",
                        data : { id : products},
                        success : function(result)
                        {
                            console.log(result);
                            $("#product_view").html('').append(result.data);
                        }
                    });
                }
            }
        });
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\F1-app\resources\views/home/index.blade.php ENDPATH**/ ?>