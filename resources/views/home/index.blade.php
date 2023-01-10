@extends('layouts.app')
@section('title', 'Home')
@section('content')
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
            <img src="{{ asset('img/banner1.jpg') }}" alt="" title="#slider-direction-1"/>
            <img src="{{ asset('img/banner2.jpg') }}" alt="" title="#slider-direction-2"/>
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
        @if (isset($productHot))
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="features-curosel">
                        <!-- single-product start -->
                        @foreach ($productHot as $hot)
                        <div class="col-lg-12 col-md-12">
                            <div class="single-product first-sale">
                                <div class="product-img">
                                    @if ($hot->pro_number == 0)
                                    <span style="position: absolute;background: #e91e63; color: white; padding: 2px 6px; border-radius: 5px;font-size: 10px">Temporarily out of stock</span>
                                    @else
                                        @if ($hot->pro_sale > 0)
                                        <span style="right: 0;position: absolute;background-image: linear-gradient(-99deg,#ec1f1f 0%,#ff9c00 100%); padding: 1px 7px; border-radius: 10px;color: white;font-size: 13px">Sale {{ $hot->pro_sale }}%</span>
                                        @endif
                                    @endif
                                    <a href="{{ route('get.detail.product', [$hot->pro_slug, $hot->id]) }}">
                                        <img class="primary-image" src="{{ pare_url_file($hot->pro_avatar) }}" alt="" style="height: 265px; width: 265px; object-fit: contain;"/>
                                        <img class="secondary-image" src="{{ pare_url_file($hot->pro_avatar) }}" alt="" 
                                        style = "height: 265px; width: 265px; object-fit: contain;-moz-transform: scaleX(-1);-o-transform: scaleX(-1);-webkit-transform: scaleX(-1);transform: scaleX(-1);
                                                filter: FlipH;-ms-filter: "FlipH" />
                                    </a>
                                    <div class="action-zoom">
                                        <div class="add-to-cart">
                                            <a href="{{ route('get.detail.product', [$hot->pro_slug, $hot->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="{{ route('add.shopping.cart', $hot->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
                                        </div>	
                                    </div>
                                   <div class="price-box">
                                       <span class="new-price">{{ number_format($hot->pro_price* (100 - $hot->pro_sale)/100,'0','','.',).' VND' }}</span>
                                   </div>
                                </div>
                                <div class="product-content">
                                    <h2 class="product-name" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: 250px;"><a href="#">{{ $hot->pro_name }}</a></h2>
                                    <p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 3;  /* số dòng hiển thị */
                                            -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;">{{ $hot->pro_description }}</p>
                                </div>
                            </div>
                        </div>   
                        @endforeach
                        <!-- single-product end -->
                    </div>
                </div>	
            </div>
        </div>
        @endif
        <!-- our-product area end -->	
    </div>
</div>
<!-- product section end -->
@include('components.product_suggest')

<!-- LASTESTPOST area start -->
<div class="latest-post-area">
    <div class="container">
        <div class="area-title">
            <h2>Latest Post</h2>
        </div>
        @if (isset($articleNews))
        <div class="row">
            <div class="all-singlepost">
                @foreach ($articleNews as $arNew)                
                <!-- single latestpost start -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-post" style="margin-bottom: 30px">
                        <div class="post-thumb">
                            <a href="{{ route('get.detail.article',[$arNew->a_slug, $arNew->id]) }}">
                                <img src="{{ asset(pare_url_file($arNew->a_avater)) }}" alt="" style="width: 370px; height: 280px;object-fit: cover;" />
                            </a>
                        </div>
                        <div class="post-thumb-info">
                            <div class="post-time">
                                <a href="{{ route('get.detail.article',[$arNew->a_slug, $arNew->id]) }}">
                                    <span>{{ $arNew->a_name }}</span>
                                </a>
                            </div>
                            <div class="postexcerpt">
                                <p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 3;  /* số dòng hiển thị */
                                -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;">{{ $arNew->a_description }}</p>
                                <a href="{{ route('get.detail.article',[$arNew->a_slug, $arNew->id]) }}" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single latestpost end -->
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
<!-- latestpost area end -->

<div id="product_view"></div>

<div class="block-category">
    <div class="container">
        <div class="row">
            @if (isset($categoriesHome))
            @foreach ($categoriesHome as $categoryHome)
            <!-- featured block start -->
            <div class="col-md-4">
                <!-- block title start -->
                <div class="block-title">
                    <h2>{{ $categoryHome->c_name }}</h2>
                </div>
                <!-- block title end -->
                <!-- block carousel start -->
                @if (isset($categoryHome->products))
                <div class="block-carousel owl-carousel owl-theme" style="opacity: 1; display: block;">
                    <div class="owl-wrapper-outer">
                        <div class="owl-wrapper" style="width: 2960px; left: 0px; display: block;">
                            <div class="owl-item" style="width: 370px;">
                                <div class="block-content">
                                    <?php 
                                    $temp=0;    
                                    ?>
                                    @foreach ($categoryHome->products as $product)
                                    @if($temp<2)
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="{{ route('get.detail.product', [$product->pro_slug, $product->id]) }}"><img src="{{ asset(pare_url_file($product->pro_avatar)) }}" style="width: 170px; height: 208px;object-fit: contain;" alt=""></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="{{ route('get.detail.product', [$product->pro_slug, $product->id]) }}" style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 3;  /* số dòng hiển thị */
                                                -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;" title="Quick View">{{ $product->pro_name }}</a></h3>
                                            <p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 3;  /* số dòng hiển thị */
                                            -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;">{{ $product->pro_description }}</p>
                                            @if($product->pro_sale > 0)
                                            <div class="cat-price">{{ number_format($product->pro_price* (100 - $product->pro_sale)/100,'0','','.',).' VND' }} <span class="old-price">{{  number_format($product->pro_price,'0','','.',).' VND'  }}</span></div>
                                            @else
                                            <div class="cat-price">{{ number_format($product->pro_price,'0','','.',).' VND' }}</div>
                                            @endif
                                            <?php 
                                                $age = 0;
                                                if ($product->pro_total_rating > 0)
                                                $age = round($product->pro_total_number / $product->pro_total_rating,2)
                                            ?>
                                            <div class="cat-rating">
                                                @for ($i = 1;$i <= 5; $i++)
                                                <i class="fa fa-star {{ $i <= $age ? 'active' : '' }}" style="color: #999"></i>
                                                @endfor
                                            </div>								
                                        </div>
                                    </div>
                                    <?php $temp = $temp+1 ?>
                                    @endif
                                    <!-- single block end -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                @endif
                <!-- block carousel end -->
            </div>
            <!-- featured block end -->
            @endforeach
            @endif
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
@stop

@section('script')
<script>
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
	    });
        let routeRenderProduct = '{{ route('post.product.view') }}';
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
@stop