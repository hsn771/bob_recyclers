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
            font-size: 2.2rem;
            font-weight: 700;
        }

        .blog-detail-img {
            width: 100%;
            max-height: 480px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .blog-detail-header {
            margin-bottom: 20px;
        }

        .blog-category-badge {
            display: inline-block;
            background: #e8f5e9;
            color: #2d6a4f;
            font-size: 12px;
            font-weight: 600;
            padding: 3px 12px;
            border-radius: 20px;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .blog-detail-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2933;
            margin-bottom: 10px;
        }

        .blog-detail-meta {
            font-size: 13px;
            color: #9ca3af;
            margin-bottom: 20px;
        }

        .blog-detail-meta i {
            margin-right: 4px;
        }

        .blog-short-desc {
            font-size: 16px;
            color: #4b5563;
            border-left: 4px solid #2d6a4f;
            padding: 10px 18px;
            background: #f9fafb;
            border-radius: 0 8px 8px 0;
            margin-bottom: 24px;
        }

        .blog-content {
            font-size: 15px;
            line-height: 1.85;
            color: #374151;
        }

        .blog-content p {
            margin-bottom: 1rem;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 20px;
            background: #2d6a4f;
            color: #fff;
            border-radius: 20px;
            font-size: 14px;
            text-decoration: none;
            transition: background 0.3s;
            margin-bottom: 20px;
        }

        .back-btn:hover {
            background: #1a4731;
            color: #fff;
        }
    </style>

    <!-- Hero -->
    <section class="blog-hero">
        <div class="container">
            <h1>{{ $blog->title }}</h1>
            <p class="opacity-75 mb-0">
                @if($blog->category){{ $blog->category }} · @endif
                {{ $blog->published_at ? $blog->published_at->format('d M Y') : $blog->created_at->format('d M Y') }}
            </p>
        </div>
    </section>

    <!-- Blog Detail -->
    <section class="container py-5">
        <a href="{{ route('blog.index') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Blog
        </a>

        @if($blog->image)
            <img src="{{ asset('uploads/blog/' . $blog->image) }}" alt="{{ $blog->title }}" class="blog-detail-img">
        @endif

        <div class="blog-detail-header">
            @if($blog->category)
                <span class="blog-category-badge">{{ $blog->category }}</span>
            @endif
            <h2 class="blog-detail-title">{{ $blog->title }}</h2>
            <div class="blog-detail-meta">
                <i class="fas fa-calendar-alt"></i>
                {{ $blog->published_at ? $blog->published_at->format('d M Y') : $blog->created_at->format('d M Y') }}
            </div>
        </div>

        @if($blog->short_description)
            <div class="blog-short-desc">{{ $blog->short_description }}</div>
        @endif

        <div class="blog-content">
            {!! $blog->content !!}
        </div>
    </section>

    @include('frontend.layout.footer')
@endsection