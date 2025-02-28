@extends('layouts.app') <!-- Extend the layout that contains the footer -->

@section('title', $article->title) <!-- Set dynamic title based on the article -->

@section('content') <!-- Content for this page -->

    <!-- Assuming the article exists and is passed correctly to the view -->
    @if($article)
        <!-- Article Header -->
        <h1 class="article-title">{{ $article->title }}</h1>
        
        <!-- Article Publication Date -->
        <p class="date">Posted on: <strong>{{ \Carbon\Carbon::parse($article->created_at)->format('F j, Y') }}</strong></p>
        
        <!-- Display CategoryID -->
        <p class="category">Category ID: <span class="category-id">{{ $article->CategoryID ?? 'No category' }}</span></p>

        <!-- Article Content -->
        <article class="article-content">
            {!! nl2br(e($article->content)) !!} <!-- Display article content, preserving line breaks -->
        </article>

        <!-- Display tags if available -->
        @if($article->tags && is_array($article->tags)) <!-- Check if tags is an array -->
            <div class="tags">
                <strong>Tags:</strong>
                @foreach($article->tags as $tag) <!-- Directly loop through the tags array -->
                    @php
                        $slug = \Str::slug(trim($tag));  // Convert tag to a slug for the URL
                    @endphp
                    <a href="{{ route('tag.show', ['slug' => $slug]) }}" class="tag-link">{{ trim($tag) }}</a>
                @endforeach
            </div>
        @endif

    @else
        <p>Article not found</p>
    @endif

@endsection <!-- End of content section -->

@section('styles')
    <style>
        /* Article Page Styles */
        .article-title {
            color: #1a73e8;
            font-size: 2.5em;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .date {
            font-size: 1.2em;
            color: #555;
            text-align: center;
            margin-bottom: 20px;
        }

        .category {
            font-size: 1.1em;
            color: #777;
            text-align: center;
        }

        .category-id {
            font-weight: bold;
            color: #0044cc;
        }

        .article-content {
            font-size: 1.15em;
            line-height: 1.8;
            color: #333;
            margin: 20px auto;
            max-width: 800px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .tags {
            text-align: center;
            margin-top: 30px;
            font-size: 1.1em;
        }

        .tag-link {
            background-color: #0044cc;
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 20px;
            margin: 0 10px;
            transition: background-color 0.3s;
        }

        .tag-link:hover {
            background-color: #0033aa;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .article-title {
                font-size: 2em;
            }

            .article-content {
                font-size: 1.05em;
                padding: 15px;
            }
        }
    </style>
@endsection
