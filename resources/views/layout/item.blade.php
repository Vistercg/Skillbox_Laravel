<div class="blog-post">
    <h2 class="blog-post-title"><a href="/articles/{{ $article->slug }}">{{ $article->title }}</a></h2>
    <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>

    @include('layout.tags', ['tags' => $article->tags])

    {{ $article->shortBody }}
    <hr>
</div>
