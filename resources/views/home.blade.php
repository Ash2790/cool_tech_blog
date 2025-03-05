@extends('layouts.app') <!-- Extend the layout that contains the header, footer, etc. -->

@section('title', 'Cool Tech Homepage') <!-- Set the title of the page -->

@section('content')
    <div class="homepage-container" style="background-color: #f4f7fa; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 1200px; margin: 0 auto;">
        <h1 style="color: #2c3e50; font-family: 'Arial', sans-serif; font-size: 36px; text-align: center; margin-bottom: 20px;">The Cool Tech Homepage!</h1>

        <!-- Link to the About page -->
        <p style="text-align: center;">
            <a href="{{ route('about') }}" style="color: #3498db; font-size: 18px; text-decoration: none; font-weight: bold;">Learn more about us</a>
        </p>

        <!-- Display today's date -->
        <p style="text-align: center; font-size: 18px; color: #34495e;">
            Today is <strong>{{ now()->format('j F Y') }}</strong>.
        </p>

        <h2 style="color: #16a085; font-size: 28px; margin-top: 30px;">Latest Blog Posts:</h2>
        
        @if($posts->isEmpty())
            <!-- Show message if there are no blog posts -->
            <p style="color: #e74c3c; font-size: 18px; text-align: center;">No blog posts available at the moment. Check back later!</p>
        @else
            <!-- Loop through each post and display title and excerpt -->
            <ul class="blog-posts" style="list-style-type: none; padding: 0;">
                @foreach($posts as $post)
                    <li class="blog-post" style="background-color: #ffffff; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
                        @if(isset($post->id) && isset($post->title) && isset($post->content))
                            <!-- Display the post title as a link to the post page -->
                            <a href="{{ url('/article/' . $post->id) }}" style="color: #2980b9; font-size: 22px; font-weight: bold; text-decoration: none;">
                                {{ $post->title }}
                            </a>

                            <!-- Display the first 200 characters of the post content -->
                            <p style="font-size: 16px; color: #7f8c8d; margin-top: 10px;">
                                {{ Str::limit(strip_tags($post->content), 200, '...') }}
                            </p>

                            <!-- Display CategoryID and tags with a fallback message if missing -->
                            <p style="font-size: 16px; color: #95a5a6;">
                                <strong>Category:</strong> {{ $post->CategoryID ?? 'No Category' }}
                            </p>
                            <p style="font-size: 16px; color: #95a5a6;">
                                <strong>Tags:</strong> {{ $post->tags ?? 'No Tags' }}
                            </p>

                            <!-- Display the post creation date -->
                            <p style="font-size: 14px; color: #95a5a6;">
                                <em>Posted on: {{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</em>
                            </p>
                        @else
                            <!-- Handle missing post data -->
                            <p style="color: #e74c3c; font-size: 16px;">Post data is incomplete.</p>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
