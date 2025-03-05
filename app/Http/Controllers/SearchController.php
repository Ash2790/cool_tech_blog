<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function showSearchPage()
    {
        // Show the search page to the user.
        return view('search');
    }


    public function searchResults(Request $request)
    {
        // Get the search type (article, category, or tag) from the request.
        $searchType = $request->input('search_type');
        $result = null;


        // Search for articles by id.
        if ($searchType === 'article') {
            $articleId = $request->input('article_id');  // Get the id from input.


            if (!$articleId) {
                // If no article ID is provided, redirect back with an error message.
                return redirect()->route('search.page')->with('error', 'Article ID is required');
            }


            // Search for the article with the given id.
            $result = DB::table('articles')->where('ArticleID', $articleId)->first();
            if (!$result) {
                // If no article is found with the provided ID, redirect with an error message.
                return redirect()->route('search.page')->with('error', 'Article not found');
            }


            // Redirect to the article page if found.
            return redirect()->route('article.show', ['id' => $result->ArticleID]);


        // Search for categories by slug (slug-based search).
        } elseif ($searchType === 'category') {
            $categorySlug = $request->input('category_slug');  // Expecting slug input.


            if (!$categorySlug) {
                // If no category slug is provided, redirect back with an error message.
                return redirect()->route('search.page')->with('error', 'Category slug is required');
            }


            // Search for the category using the correct column name 'slug' (case-sensitive, lowercase).
            $result = DB::table('categories')->where('slug', $categorySlug)->first();
            if (!$result) {
                // If no category is found with the provided slug, redirect with an error message.
                return redirect()->route('search.page')->with('error', 'Category not found');
            }


            // Redirect to the category page if found.
            return redirect()->route('category.show', ['slug' => $result->slug]);


        // Search for tags by slug (slug-based search).
        } elseif ($searchType === 'tag') {
            $tagSlug = $request->input('tag_slug');  // Expecting slug input.


            if (!$tagSlug) {
                // If no tag slug is provided, redirect back with an error message.
                return redirect()->route('search.page')->with('error', 'Tag slug is required');
            }


            // Search for the tag using the correct column name 'slug' (case-sensitive, lowercase).
            $result = DB::table('tags')->where('slug', $tagSlug)->first();
            if (!$result) {
                // If no tag is found with the provided slug, redirect with an error message.
                return redirect()->route('search.page')->with('error', 'Tag not found');
            }


            // Redirect to the tag page if found.
            return redirect()->route('tag.show', ['slug' => $result->slug]);
        }


        // If no valid search type is found, redirect back to the search page with an error message.
        return redirect()->route('search.page')->with('error', 'Invalid search type');
    }
}
