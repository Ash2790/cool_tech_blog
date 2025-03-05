<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function show($slug)
    {
        // Fetch the category by slug
        $category = DB::table('categories')->where('slug', $slug)->first();


        // If category not found, abort with a 404
        if (!$category) {
            abort(404, 'Category not found');
        }


        // Fetch the articles that belong to the specific category
        $articles = DB::table('articles')
            ->leftJoin('article_tag', 'articles.ArticleID', '=', 'article_tag.ArticleID') // Join with article_tag table
            ->leftJoin('tags', 'article_tag.TagID', '=', 'tags.TagID') // Join with tags table
            ->where('articles.CategoryID', $category->CategoryID) // Filter by CategoryID
            ->get([
                'articles.ArticleID as id',
                'articles.Title as title',
                'articles.Content as content',
                'articles.created_at as created_at',
                'tags.slug as tag' // Get the tag slugs for articles
            ]);


        // Group the articles by id and concatenate tags for each article
        $articles = $articles->groupBy('id')->map(function ($article) {
            $tags = $article->pluck('tag')->filter()->implode(', '); // Concatenate tags for each article
            $article->first()->tags = $tags; // Assign concatenated tags to the first article in the group
            return $article->first();
        });


        // Return the category view with the category and articles data
        return view('category', ['category' => $category, 'articles' => $articles]);
    }
}
