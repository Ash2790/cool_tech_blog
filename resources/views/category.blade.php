@extends('layouts.app')

@section('title', 'Category: ' . $category->CategoryName)  <!-- Use CategoryName instead of name -->

@section('content')
    <div class="category-header">
        <h1>Category: {{ $category->CategoryName }}</h1>  <!-- Use CategoryName instead of name -->

        {{-- Check if there are articles --}}
        @if ($articles->isEmpty())
            <p>No articles found in this category.</p>
        @else
            <ul class="article-list">
                {{-- Loop through each article and display a link to the article's page --}}
                @foreach ($articles as $article)
                    <li>
                        <a href="{{ url('/article/' . $article->id) }}">{{ $article->title }}</a>
                        <p>{{ \Illuminate\Support\Str::limit($article->content, 150) }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
