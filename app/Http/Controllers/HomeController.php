<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View; // If you use View facade


class HomeController extends Controller
{
    /**
     * Show the homepage with the latest blog posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch the latest 5 articles, ordered by creation date, with CategoryID and tags
        $posts = DB::table('articles')
            ->leftJoin('article_tag', 'articles.ArticleID', '=', 'article_tag.ArticleID')
            ->leftJoin('tags', 'article_tag.TagID', '=', 'tags.TagID')
            ->orderBy('articles.created_at', 'desc')
            ->limit(5) // Limit to 5 posts
            ->get([
                'articles.ArticleID as id',
                'articles.Title as title',
                'articles.Content as content',
                'articles.created_at as created_at',
                'articles.CategoryID as category_id',
                'tags.slug as tag'  // Assuming the tags table has a column slug for the tag text
            ]);


        // Group the posts by id and concatenate the tags for each article
        $posts = $posts->groupBy('id')->map(function ($post) {
            $tags = $post->pluck('tag')->filter()->implode(', ');
            $post->first()->tags = $tags; // Assign the tags string to the first post in the group
            return $post->first();
        });


        // Pass the articles to the homepage view
        return view('home', ['posts' => $posts]);
    }
}
