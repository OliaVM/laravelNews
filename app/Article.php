<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Article extends Model
{
    public function show_all_news() {
		$news = DB::table('articles')
        ->join('users', 'articles.login_id', '=', 'users.id')
        ->select('articles.id', 'articles.rubric', 'articles.login_id', 'articles.article_date', 'articles.article_title', 'articles.article_short_text', 'articles.article_full_text', 'articles.image', 'articles.count_of_likes', 'users.name')
        ->orderBy('articles.article_date')
        ->get();
        return $news;
	}
}
