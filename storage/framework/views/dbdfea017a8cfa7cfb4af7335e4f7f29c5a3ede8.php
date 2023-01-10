<header class="short-stor">
    <div class="container-fluid">
        <div class="row">
            <!-- logo start -->
            <div class="col-md-3 col-sm-12 text-center nopadding-right">
                <div class="top-logo">
                    <a href="<?php echo e(route('home')); ?>"><img style="" src="<?php echo e(asset('img/logo.png')); ?>" alt="" /></a>
                </div>
            </div>
            <!-- logo end -->
            <!-- mainmenu area start -->
            <div class="col-md-6 text-center">
                <div class="mainmenu">
                    <nav>
                        <ul>
                            <li class="expand"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="expand"><a href="<?php echo e(route('get.product.all')); ?>">Brand / Product</a>
                                <div class="restrain mega-menu megamenu" style="width: 150%">
                                    <span style="width: 100%">
                                        <?php if(isset($categories)): ?>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                <a class="mega-menu-title" href="<?php echo e(route('get.list.product', [$category->c_slug, $category->id])); ?>"><?php echo e($category->c_name); ?></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php endif; ?>
                                    </span>
                                    
                                </div>
                            </li>
                            <li class="expand"><a href="<?php echo e(route('get.list.article')); ?>" title="Article">Articles</a></li>
                            
                            <li class="expand"><a href="<?php echo e(route('get.contact')); ?>">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- mobile menu start -->
                <div class="row">
                    <div class="col-sm-12 mobile-menu-area">
                        <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                            <span class="mobile-menu-title">Menu</span>
                            <nav>
                                <ul>
                                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                    <li><a href="<?php echo e(route('get.product.all')); ?>">Brand / Product</a>
                                        <ul>
                                            <?php if(isset($categories)): ?>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(route('get.list.product', [$category->c_slug, $category->id])); ?>"><?php echo e($category->c_name); ?></a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo e(route('get.list.article')); ?>">Articles</a></li>
                                    
                                    <li><a href="./contact">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>						
                    </div>
                </div>
                <!-- mobile menu end -->
            </div>
            <!-- mainmenu area end -->
            <!-- top details area start -->
            <div class="col-md-3 col-sm-12 nopadding-left">
                <div class="top-detail">
                    <!-- language division start -->
                    <div class="disflow">
                        <div class="expand lang-all disflow">
                            <a href="#"><img src="<?php echo e(asset('img/country/en.gif')); ?>" alt="">English</a>
                            <ul class="restrain language">
                                <li><a href="#"><img src="<?php echo e(asset('img/country/vietnam.png')); ?>" alt="">Viet Nam</a></li>
                                <li><a href="#"><img src="<?php echo e(asset('img/country/russia.png')); ?>" alt="">Russia</a></li>
                                <li><a href="#"><img src="<?php echo e(asset('img/country/en.gif')); ?>" alt="">English</a></li>
                            </ul>
                        </div>
                        <div class="expand lang-all disflow">
                            <a href="#">₫ VND</a>
                            <ul class="restrain language">
                                <li><a href="#">€ Eur</a></li>
                                <li><a href="#">$ USD</a></li>
                                <li><a href="#">₽ Ruble</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- language division end -->
                    <!-- addcart top start -->
                    <div class="disflow">
                        <div class="circle-shopping expand">
                            <div class="shopping-carts text-right">
                                <div class="cart-toggler">
                                    <a href="<?php echo e(route('get.list.shopping.cart')); ?>"><i class="icon-bag"></i></a>
                                    <a href="<?php echo e(route('get.list.shopping.cart')); ?>"><span class="cart-quantity"><?php echo e(Cart::count()); ?></span></a>
                                </div>

                                <div class="restrain small-cart-content">
                                    <ul class="cart-list">
                                        <?php  
                                        $products = Cart::content();    
                                        ?>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <li>
                                            <a class="sm-cart-product" href="">
                                                <img src="<?php echo e(asset(pare_url_file($product->options->avatar))); ?>" alt="">
                                            </a>
                                            <div class="small-cart-detail">
                                                <a class="remove" href="<?php echo e(route('delete.shopping.cart', $key)); ?>"><i class="fa fa-times-circle"></i></a>
                                                <a class="small-cart-name" href="<?php echo e(route('get.detail.product', [$product->options->slug, $product->id])); ?>" 
                                                    style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: 150px; font-size: 12px"><?php echo e($product->name); ?></a>
                                                <span class="quantitys"><strong><?php echo e($product->qty); ?></strong>x<span style="font-size: 11px"><?php echo e(number_format($product->qty * $product->price,'0','','.',).' VND'); ?></span></span>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <p class="total">Subtotal: <span class="amount"><?php echo e(Cart::subtotal(0, 3)); ?> VND</span></p>
                                    <p class="buttons">
                                        <?php
                                        $total = Cart::subtotal(0, 3);   
                                        ?>
                                        <?php if( $total > 0): ?>
                                        <a href="<?php echo e(route('get.form.pay')); ?>" class="button">Checkout</a>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- addcart top start -->
                    <!-- search divition start -->
                    <div class="disflow">
                        <div class="header-search expand">
                            <div class="search-icon fa fa-search"></div>
                            <div class="product-search restrain">
                                <div class="container nopadding-right">
                                    <form action="<?php echo e(route('get.product.list')); ?>" id="searchform" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" maxlength="128" name="k" placeholder="Search product...">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- search divition end -->
                    <div class="disflow">
                    </div>
                    <!-- info -->
                    <div class="disflow">
                        <?php if(Auth::check()): ?>
                        <div style="border-left: 2px solid black">
                            <a href="<?php echo e(route('user.dashboard')); ?>">&nbsp; <?php echo e(get_data_user('web', 'name')); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- end info -->
                    <div class="disflow">
                        <div class="expand dropps-menu">
                            <a href="#"><i class="fa fa-align-right"></i></a>
                            <ul class="restrain language">
                                <?php if(Auth::check()): ?>
                                <li><a href="<?php echo e(route('user.dashboard')); ?>" title="Personal Infor">My Account</a></li>
                                <li><a href="<?php echo e(route('get.form.pay')); ?>">Checkout</a></li>
                                <li><a href="<?php echo e(route('get.logout.user')); ?>">Log out</a></li>     
                                <?php else: ?>
                                <li><a href="<?php echo e(route('get.login')); ?>">Log in</a></li>      
                                <li><a href="<?php echo e(route('get.register')); ?>">Registration</a></li>                   
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- top details area end -->
        </div>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\F1-app\resources\views/components/header.blade.php ENDPATH**/ ?>