@extends('frontend.layout.app')
@section('content')
@include('frontend.layout.nav')

<style>
    .blog-hero {
        background: linear-gradient(135deg, #1a4731, #2d6a4f);
        padding: 70px 0 50px;
        color: #fff;
    }
    .blog-hero h1 {
        font-size: 2.5rem;
        font-weight: 700;
        letter-spacing: 1px;
    }
    .blog-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.14);
    }
    .blog-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }
    .blog-card .card-body {
        padding: 20px;
    }
    .blog-category {
        display: inline-block;
        background: #e8f5e9;
        color: #2d6a4f;
        font-size: 12px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        margin-bottom: 10px;
        text-transform: uppercase;
    }
    .blog-card .card-title {
        font-size: 1.05rem;
        font-weight: 700;
        color: #1f2933;
        margin-bottom: 8px;
    }
    .blog-card .card-text {
        font-size: 14px;
        color: #6b7280;
        line-height: 1.6;
    }
    .blog-date {
        font-size: 12px;
        color: #9ca3af;
    }
    .read-more-btn {
        display: inline-block;
        margin-top: 14px;
        padding: 6px 18px;
        background: #2d6a4f;
        color: #fff;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.3s ease;
    }
    .read-more-btn:hover {
        background: #1a4731;
        color: #fff;
    }
    .no-blog {
        text-align: center;
        padding: 60px 0;
        color: #9ca3af;
    }
    .no-blog i {
        font-size: 60px;
        margin-bottom: 16px;
    }
</style>

<!-- Hero -->
<section class="blog-hero">
    <div class="container">
        <h1 class="mb-2"><span>B</span>logs</h1>
        <p class="mb-0 opacity-75">Latest news, updates, and insights from Bay of Bengal Recyclers</p>
    </div>
</section>

<!-- Blog Posts -->
<section class="container py-5">

    @if($blogs->isEmpty())
        <div class="no-blog">
            <i class="fas fa-newspaper text-muted"></i>
            <p class="mt-2">No blog posts yet. Check back soon!</p>
        </div>
    @else
        <div class="row g-4">
            @foreach($blogs as $blog)
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="blog-card card">
                        @if($blog->image)
                            <img src="{{ asset('uploads/blog/' . $blog->image) }}" alt="{{ $blog->title }}">
                        @else
                            <div style="height:220px; background:#e8f5e9; display:flex; align-items:center; justify-content:center;">
                                <i class="fas fa-newspaper" style="font-size:50px; color:#2d6a4f;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            @if($blog->category)
                                <span class="blog-category">{{ $blog->category }}</span>
                            @endif
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            @if($blog->short_description)
                                <p class="card-text">{{ Str::limit($blog->short_description, 100) }}</p>
                            @endif
                            <div class="blog-date">
                                <i class="fas fa-calendar-alt me-1"></i>
                                {{ $blog->published_at ? $blog->published_at->format('d M Y') : $blog->created_at->format('d M Y') }}
                            </div>
                            <a href="{{ route('blog.show', $blog->slug) }}" class="read-more-btn">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $blogs->links() }}
        </div>
    @endif

</section>

@include('frontend.layout.footer')
@endsection
