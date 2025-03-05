@extends('layouts.app')

@section('title', 'Search - Cool Tech Blog')

@section('content')
    <h1>Search Cool Tech Blog</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('search.results') }}">
        <div>
            <label for="search_type">Search Type:</label>
            <select name="search_type" id="search_type">
                <!-- Dynamically select the search type based on the request value -->
                <option value="article" {{ request()->get('search_type') == 'article' ? 'selected' : '' }}>Article</option>
                <option value="category" {{ request()->get('search_type') == 'category' ? 'selected' : '' }}>Category</option>
                <option value="tag" {{ request()->get('search_type') == 'tag' ? 'selected' : '' }}>Tag</option>
            </select>
        </div>

        <!-- Article ID Search -->
        <div id="search_article" class="search-field" style="display: {{ request()->get('search_type') == 'article' || !request()->get('search_type') ? 'block' : 'none' }};">
            <label for="article_id">Article ID:</label>
            <input type="text" id="article_id" name="article_id" placeholder="Enter article ID" value="{{ request()->get('article_id') }}">
            <button type="submit" name="search_type" value="article">Search Article</button>
        </div>

        <!-- Category Search -->
        <div id="search_category" class="search-field" style="display: {{ request()->get('search_type') == 'category' ? 'block' : 'none' }};">
            <label for="category_slug">Category Slug:</label>
            <input type="text" id="category_slug" name="category_slug" placeholder="Enter category slug" value="{{ request()->get('category_slug') }}">
            <button type="submit" name="search_type" value="category">Search Category</button>
        </div>

        <!-- Tag Search -->
        <div id="search_tag" class="search-field" style="display: {{ request()->get('search_type') == 'tag' ? 'block' : 'none' }};">
            <label for="tag_slug">Tag Slug:</label>
            <input type="text" id="tag_slug" name="tag_slug" placeholder="Enter tag slug" value="{{ request()->get('tag_slug') }}">
            <button type="submit" name="search_type" value="tag">Search Tag</button>
        </div>
    </form>

    <!-- Display Error Message if any -->
    @if ($message = session('error'))
        <p style="color:red">{{ $message }}</p>
    @endif

    <script>
        // Show the correct search field based on the selected search type
        document.getElementById('search_type').addEventListener('change', function() {
            let searchType = this.value;
            document.querySelectorAll('.search-field').forEach(function(field) {
                field.style.display = 'none';  // Hide all fields initially
            });

            if (searchType === 'article') {
                document.getElementById('search_article').style.display = 'block';  // Show article search field
            } else if (searchType === 'category') {
                document.getElementById('search_category').style.display = 'block';  // Show category search field
            } else if (searchType === 'tag') {
                document.getElementById('search_tag').style.display = 'block';  // Show tag search field
            }
        });

        // Trigger the change event on load to show the correct field based on the existing search type
        document.getElementById('search_type').dispatchEvent(new Event('change'));
    </script>
@endsection
