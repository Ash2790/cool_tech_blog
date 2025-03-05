<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;


class TagController extends Controller
{
    public function show($slug)
    {
        // Fetch the tag by slug
        $tag = DB::table('tags')->where('slug', $slug)->first();


        // If the tag doesn't exist, show a 404 error
        if (!$tag) {
            abort(404, 'Tag not found');
        }


        // Fetch articles related to the tag via the junction table
        $articles = DB::table('articles')
            ->join('article_tag', 'articles.ArticleID', '=', 'article_tag.ArticleID') // Join with article_tag
            ->join('tags', 'article_tag.TagID', '=', 'tags.TagID') // Join with tags
            ->where('tags.slug', $slug) // Filter by tag slug
            ->get([
                'articles.ArticleID as id',
                'articles.Title as title',
                'articles.Content as content',
                'articles.created_at as created_at'
            ]);


        // Return the tag view with the tag and its associated articles
        return view('tag', ['tag' => $tag, 'articles' => $articles]);
    }
}
