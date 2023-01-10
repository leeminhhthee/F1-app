@extends('layouts.app')
@section('title', 'Articles')
@section('content')
<style>
    .article_content h2{
        font-size: 1.4em;
    }
    .article_content {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>
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
                        <li class="home">
                            <a href="{{ route('get.list.article') }}">Articles</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>{{ $articleDetail->a_name }}</span></li>
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
            <h2>NEWS</h2>
        </div>
        <!-- contact-details start -->
		<div class="main-contact-area">
			<div class="container">
				<div class="row">
                    <div class="col-sm-9">
                        <div class="article_content" style="margin-bottom: 50px">
                            <h1>{{ $articleDetail->a_name }}</h1>
                            <p style="font-weight: 500; color: #333">{{ $articleDetail->a_description}}</p>
                            <div>
                                {!! $articleDetail->a_content !!}
                            </div>
                        </div>
                        <h4><i class="fa fa-newspaper-o fa-2x"></i> Another article</h4>
                        @include('components.article')
                    </div>
                    <div class="col-sm-3">
                        <h4 style="color: rgb(197, 1, 1)"><i class="fa fa-fire fa-2x"></i> Featured Posts</h5>
                        <div class="list_article_hot">
                        @include('components.article_hot')
                        </div>
                    </div>
				</div>
			</div>	
		</div>
		<!-- contact-details end -->
    </div>
</div>
@stop