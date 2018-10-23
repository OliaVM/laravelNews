<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Session;

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

	public function show_all_news_by_likes() {
		$news = DB::table('articles')
		->join('users', 'articles.login_id', '=', 'users.id')
        ->select('articles.id', 'articles.rubric', 'articles.login_id', 'articles.article_date', 'articles.article_title', 'articles.article_short_text', 'articles.article_full_text', 'articles.image', 'articles.count_of_likes', 'users.name')
        ->orderBy('articles.count_of_likes', 'desc')
        ->get();
        return $news;
	}

	public function show_article($number) {
		$news = DB::table('articles')
        ->join('users', 'articles.login_id', '=', 'users.id')
        ->select('articles.id', 'articles.rubric', 'articles.login_id', 'articles.article_date', 'articles.article_title', 'articles.article_short_text', 'articles.article_full_text', 'articles.image', 'articles.count_of_likes', 'users.name')
        ->where('articles.id', '=', $number)
        ->orderBy('articles.article_date')
        ->get();
        return $news;
	}

	public function show_selected_rubricOfNews($rubric) {
		$news = DB::table('articles')
        ->join('users', 'articles.login_id', '=', 'users.id')
        ->select('articles.id', 'articles.rubric', 'articles.login_id', 'articles.article_date', 'articles.article_title', 'articles.article_short_text', 'articles.article_full_text', 'articles.image', 'articles.count_of_likes', 'users.name')
        ->where('rubric', '=', $rubric)
        ->orderBy('articles.article_date')
        ->get();
        return $news;
	}

	public function delete_article(Request $request) {
		// Deleting article
		$article_delete = $request->input('delete_id'); 
		$login_id = $request->input('login_id'); 
		//  get autentifacated_user_ID 
		$session_login_id = Auth::id();
		if  ($login_id == $session_login_id) {		
			DB::delete("DELETE FROM articles WHERE id=:id and login_id=:login_id", ['id' => $article_delete, 'login_id' => $session_login_id]); 
			echo "Запись удалена";
		} else {
			echo "У вас нет прав для удаления этой записи";
		}
	}

		public function add_like(Request $request) {
		if ($request->isMethod("post")) { //если пользователь нажал на кнопку поставить лайк
			$article_id = $request->input('article_id'); 
			$login_id = Auth::id();
			$arrayLike = DB::select("SELECT * FROM likes WHERE login_id = :login_id and article_id = :article_id", ['login_id' => $login_id, 'article_id' => $article_id]);

			if(empty($arrayLike)) { // || == 0
				//add in TABLE LIKES
				$likes = 1;
				DB::insert("INSERT INTO likes (login_id, article_id, count_of_likes) VALUES (:login_id, :article_id, :count_of_likes)", ['login_id' => $login_id, 'article_id' => $article_id, 'count_of_likes' => $likes]);

				//add in TABLE ARTICLES
				$count_of_likes = DB::table('likes')->where('count_of_likes', 1)->where('article_id', $article_id)->count();
				dump($count_of_likes);
				DB::update("UPDATE articles SET count_of_likes = :count_of_likes WHERE id = :id", ['count_of_likes' => $count_of_likes, 'id' => $article_id]);
			} 
		}
		echo "Вы проголосовали";
	}
}
