{{-- <?php 
$i=0;
?> --}}
@if (isset($articlesHot))
@foreach ($articlesHot as $articleHot)
    {{-- @if($i < 3) --}}
    <div class="article_img">
        <a href="{{ route('get.detail.article',[$articleHot->a_slug, $articleHot->id]) }}">
            <img src="{{ asset(pare_url_file($articleHot->a_avater)) }}" alt="Hot">
        </a>
    </div>
    <div class="article_info">
        <a href="{{ route('get.detail.article',[$articleHot->a_slug, $articleHot->id]) }}">
            <h5 style="margin-top: 10px;margin-bottom: 5px">{{ $articleHot->a_name }}</h5>
        </a>
        <p>{{ $articleHot->a_description }}</p>
    </div> 
    {{-- @endif --}}
    {{-- <?php $i++ ?> --}}
@endforeach
@endif 