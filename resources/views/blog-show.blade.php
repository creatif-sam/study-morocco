@extends('layouts.app')

@section('title', $blog->title . ' • Études Maroc')

@push('styles')
<style>
.article-container {
    max-width: 850px;
    margin: 40px auto;
    padding: 0 20px;
}
.article-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 6px 20px rgba(0,0,0,.08);
    overflow: hidden;
}
.article-image img {
    width: 100%;
    height: auto;
    display: block;
    max-height: 400px;
    object-fit: cover;
}
.article-body {
    padding: 28px 32px;
}
.article-meta {
    font-size: .85rem;
    color: #475569;
    margin-bottom: 8px;
}
.article-title {
    font-size: clamp(26px, 3vw, 36px);
    font-weight: 800;
    color: #C1272D;
    margin-bottom: 20px;
    line-height: 1.3;
}
.article-content {
    line-height: 1.75;
    font-size: 1.05rem;
    color: #0f172a;
}
.back-link {
    display: inline-block;
    margin-top: 25px;
    font-size: .9rem;
    font-weight: 600;
    color: #006233;
    text-decoration: none;
}
.back-link:hover {
    text-decoration: underline;
}
.related {
    margin-top: 50px;
}
.related h3 {
    font-size: 1.2rem;
    font-weight: 700;
    color: #C1272D;
    margin-bottom: 15px;
}
.related-grid {
    display: grid;
    gap: 20px;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
}
.related-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,.08);
    padding: 12px 14px;
    transition: .3s;
}
.related-card:hover { transform: translateY(-3px); }
.related-card a {
    text-decoration: none;
    color: #0f172a;
    font-weight: 600;
    font-size: .95rem;
}
.related-card a:hover { color: #006233; }
</style>
@endpush

@section('content')
<div class="article-container">
    <article class="article-card">
        @if($blog->image)
            <div class="article-image">
                <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}">
            </div>
        @endif

        <div class="article-body">
            <div class="article-meta">
                Publié le {{ $blog->created_at->format('d M Y') }}
            </div>
            <h1 class="article-title">{{ $blog->title }}</h1>

            <div class="article-content">
                {!! $blog->content !!}
            </div>

            <a href="{{ route('resources.index') }}" class="back-link">← Retour aux ressources</a>
        </div>
    </article>

    {{-- Related posts --}}
    @if(isset($related) && $related->count())
        <div class="related">
            <h3>Articles similaires</h3>
            <div class="related-grid">
                @foreach($related as $item)
                    <div class="related-card">
                        <a href="{{ route('resources.show', $item->slug) }}">
                            {{ $item->title }}
                        </a>
                        <div class="text-sm text-gray-500">
                            {{ $item->created_at->format('d M Y') }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
