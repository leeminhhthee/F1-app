<?php if(!empty($productSuggest)): ?>
<div class="our-product-area new-product">
    <div class="container">
        <div class="area-title">
            <h2>Maybe you like</h2>
        </div>
        <!-- our-product area start -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                        <!-- single-product start -->
                        <?php $__currentLoopData = $productSuggest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-3">
                            <div class="single-product first-sale">
                                <div class="product-img">
                                    <?php if($product->pro_number == 0): ?>
                                    <span style="position: absolute;background: #e91e63; color: white; padding: 2px 6px; border-radius: 5px;font-size: 10px">Temporarily out of stock</span>
                                    <?php else: ?>
                                        <?php if($product->pro_sale > 0): ?>
                                        <span style="right: 0;position: absolute;background-image: linear-gradient(-99deg,#ec1f1f 0%,#ff9c00 100%); padding: 1px 7px; border-radius: 10px;color: white;font-size: 13px">Sale <?php echo e($product->pro_sale); ?>%</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('get.detail.product', [$product->pro_slug, $product->id])); ?>">
                                        <img class="primary-image" src="<?php echo e(pare_url_file($product->pro_avatar)); ?>" alt="" style="height: 265px; width: 265px; object-fit: contain;"/>
                                        <img class="secondary-image" src="<?php echo e(pare_url_file($product->pro_avatar)); ?>" alt="" 
                                        style = "height: 265px; width: 265px; object-fit: contain;-moz-transform: scaleX(-1);-o-transform: scaleX(-1);-webkit-transform: scaleX(-1);transform: scaleX(-1);
                                                filter: FlipH;-ms-filter: "FlipH" />
                                    </a>
                                    <div class="action-zoom">
                                        <div class="add-to-cart">
                                            <a href="<?php echo e(route('get.detail.product', [$product->pro_slug, $product->id])); ?>" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="<?php echo e(route('add.shopping.cart', $product->id)); ?>" title="Add to Cart"><i class="icon-bag"></i></a>
                                        </div>	
                                    </div>
                                   <div class="price-box">
                                       <span class="new-price"><?php echo e(number_format($product->pro_price* (100 - $product->pro_sale)/100,'0','','.',).' VND'); ?></span>
                                   </div>
                                </div>
                                <div class="product-content">
                                    <h2 class="product-name" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: 250px;"><a href="#"><?php echo e($product->pro_name); ?></a></h2>
                                    <p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 3;  /* s??? d??ng hi???n th??? */
                                            -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;"><?php echo e($product->pro_description); ?></p>
                                </div>
                            </div>
                        </div>   
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- single-product end -->
                </div>	
            </div>
        </div>
        <!-- our-product area end -->	
    </div>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\F1-app\resources\views/components/product_suggest.blade.php ENDPATH**/ ?>