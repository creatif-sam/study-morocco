@extends('layouts.app')

@section('title', 'Ressources • Études Maroc')

@push('styles')
<style>
/* Layout spacing */
body {
    font-family: 'Inter', system-ui, sans-serif;
    background: #f9fafb;
    color: #0f172a;
}

/* Hero (latest article) */
.hero {
    display: flex;
    flex-wrap: wrap;
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,.08);
    margin-bottom: 40px;
}
.hero img {
    width: 100%;
    max-width: 50%;
    object-fit: cover;
}
.hero-body {
    flex: 1;
    padding: 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.hero-meta { font-size: .85rem; color: #475569; margin-bottom: 8px; }
.hero-title { font-size: 1.8rem; font-weight: 800; color: #C1272D; margin-bottom: 14px; }
.hero-text { font-size: 1rem; color: #0f172a; line-height: 1.6; margin-bottom: 18px; }
.hero-link { color: #006233; font-weight: 600; text-decoration: none; }
.hero-link:hover { text-decoration: underline; }

/* Grid of other posts */
.grid {
    display: grid;
    gap: 24px;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
}
.card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,.08);
    overflow: hidden;
    transition: .3s;
    display: flex;
    flex-direction: column;
}
.card:hover { transform: translateY(-3px); box-shadow: 0 6px 16px rgba(0,0,0,.12); }
.card img { width: 100%; height: 160px; object-fit: cover; }
.card-body { padding: 16px; flex-grow: 1; display: flex; flex-direction: column; }
.card-meta { font-size: .8rem; color: #475569; margin-bottom: 4px; }
.card-title { font-size: 1rem; font-weight: 700; color: #C1272D; margin-bottom: 10px; }
.card-text { font-size: .9rem; color: #0f172a; flex-grow: 1; line-height: 1.5; }
.read-more { font-size: .85rem; font-weight: 600; color: #006233; margin-top: 12px; text-decoration: none; }
.read-more:hover { text-decoration: underline; }

/* Mobile responsiveness */
@media (max-width: 768px) {
    .hero { flex-direction: column; }
    .hero img { max-width: 100%; height: 240px; }
}
</style>
@endpush

@section('content')
<div class="py-10 container mx-auto px-4">
    <h1 class="text-3xl font-bold text-[#C1272D] mb-8">Ressources & Articles</h1>

    @if($blogs->count())
        {{-- Latest Post Hero --}}
        @php $latest = $blogs->first(); @endphp
        <div class="hero">
            <img src="{{ $latest->image ? asset('storage/blog-covers/'.$latest->image) : asset('images/default.jpg') }}" 
                 alt="{{ $latest->title }}">
            <div class="hero-body">
                <div class="hero-meta">{{ $latest->created_at->format('d M Y') }}</div>
                <h2 class="hero-title">{{ $latest->title }}</h2>
                <p class="hero-text">{{ Str::limit(strip_tags($latest->content), 200) }}</p>
                <a href="{{ route('resources.show', $latest->slug) }}" class="hero-link">Lire la suite →</a>
            </div>
        </div>

        {{-- Other posts in grid --}}
        @if($blogs->count() > 1)
            <div class="grid">
                @foreach($blogs->skip(1) as $blog)
                    <div class="card">
                        <img src="{{ $blog->image ? asset('storage/blog-covers/'.$blog->image) : asset('images/default.jpg') }}" 
                             alt="{{ $blog->title }}">
                        <div class="card-body">
                            <div class="card-meta">{{ $blog->created_at->format('d M Y') }}</div>
                            <h2 class="card-title">{{ $blog->title }}</h2>
                            <p class="card-text">{{ Str::limit(strip_tags($blog->content), 120) }}</p>
                            <a href="{{ route('resources.show', $blog->slug) }}" class="read-more">Lire la suite →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <p class="text-gray-600">Aucun article disponible pour le moment.</p>
    @endif
</div>
@endsection
