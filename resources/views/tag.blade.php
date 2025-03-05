@extends('layouts.app')

@section('title', 'Tag: ' . $tag->slug)  <!-- Display tag slug in the title -->

@section('content')

    <div class="tag-header">
        <h1>Tag: {{ $tag->slug }}</h1>  <!-- Display tag slug -->

        {{-- Check if there are articles --}}
        @if ($articles->isEmpty())
            <p>No articles found with this tag.</p>
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