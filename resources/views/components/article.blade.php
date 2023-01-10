@if (isset($articles))
    @foreach ($articles as $article)
        <div class="article" style="display: flex; margin-bottom: 10px; padding-bottom:10px; border-bottom: 1px solid #e6e4e4">
            <div class="article_avatar">
                <a href="{{ route('get.detail.article',[$article->a_slug, $article->id]) }}">
                    <img src="{{ asset(pare_url_file($article->a_avater)) }}" style="width: 200px; height: 120px;" alt="">
                </a>
            </div>
            <div class="article_info" style="width: 80%; margin-left: 20px">
                <h5><a href="{{ route('get.detail.article',[$article->a_slug, $article->id]) }}">{{ $article->a_name }}</a></h5>
                <p style="font-size: 13px">{{ $article->a_description }}</p>
                <p>Le Minh The • <span>{{ $article->created_at }}</span></p>
            </div>
        </div>
    @endforeach
    <div>
        {{ $articles->links() }}
    </div>
@endif