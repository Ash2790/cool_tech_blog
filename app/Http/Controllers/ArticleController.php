<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View; // If you use View facade
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function show($id)
    {
        // Fetch the article by ID along with category_id, and related tags using the junction table
        $article = DB::table('articles')
            ->leftJoin('article_tag', 'articles.ArticleID', '=', 'article_tag.ArticleID') // Join with article_tag
            ->leftJoin('tags', 'article_tag.TagID', '=', 'tags.TagID') // Join with tags
            ->where('articles.ArticleID', $id) // Filter by the provided article ID
            ->first([
                'articles.ArticleID as id',
                'articles.Title as title',
                'articles.Content as content',
                'articles.created_at as created_at',
                'articles.CategoryID as category_id',
                'tags.slug as tag' // Get the tag slug for the related tags
            ]);


        // If article not found, abort with a 404
        if (!$article) {
            abort(404, 'Article not found');
        }


        // Check if any tags exist and group them if multiple
        if ($article->tag) {
            $article->tags = [$article->tag]; // If a tag exists, assign it to 'tags'
        } else {
            $article->tags = []; // No tags, assign an empty array
        }


        // Return the article view with the article data
        return view('article', ['article' => $article]);
    }
}
