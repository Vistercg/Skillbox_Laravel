@php
    $articles = $articles ?? collect();
@endphp

@if($article->tags->isNotEmpty())
    <div>
        @foreach($article->tags as $tag)
            <a href="#" class="badge rounded-pill bg-secondary">{{ $tag->name }}</a>
        @endforeach
    </div>
@endif
