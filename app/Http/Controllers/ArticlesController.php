<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\UploadedFile;
use Session;

class ArticlesController extends Controller
{
	public function create_article(Request $request) {
	    //adding in database: picture and text information, which the user uploaded; date,calculated using the function 
		if ($request->isMethod("post")) { //if(isset($_POST["go"]))
			//Adding the picture on the server, and a link of picture in the database
			if ($request->hasfile('userfile')) { 
				$fullPath =  public_path().'/images/';
				$file = $request->file('userfile');
				$filename = str_random(20) . '.' . $file->getClientOriginalExtension() ?: 'jpg';
				$request->file('userfile')->move($fullPath, $filename);
				$image = $filename;
		
				//Work with database: Adding the text information and the date
				$article_date = $this->getFullNowDateInCity(7);	
				$login_id = Auth::id();	
				//$userfile = $request->input('userfile');
				$rubric	= $request->input('rubric');
				$article_title = $request->input('article_title');	
				$article_short_text	= $request->input('article_short_text');
				$article_full_text = $request->input('article_full_text');
				
				$this->validate($request, [
					'rubric' => 'required',
				    'article_title' => 'required|max:50', //если не пустое значение параметра.Проверка на наличие только букв, цифр, тире и символа подчеркивания
				    'article_short_text' => 'required|max:500',
				    'article_full_text' => 'required|max:5000',
				    //'userfile' => 'image|mimes:jpg,gif,png'
			  	]); 
				
				// Adding information in the database
				DB::insert("INSERT INTO articles (rubric, article_title, article_date, image, article_short_text, article_full_text, count_of_likes, login_id) VALUES (:rubric, :article_title, :article_date, :image, :article_short_text, :article_full_text, :count_of_likes, :login_id)", ['rubric' => $rubric, 'article_title' => $article_title, 'article_date' => $article_date, 'image' => $image, 'article_short_text' => $article_short_text, 'article_full_text' => $article_full_text, 'count_of_likes' => '0', 'login_id' => $login_id]); 
				echo "Запись добавлена";
			}
		}	
		return view('layouts/news', ['name' => 'add_news']);
	}
		

	// add date
	public function getFullNowDateInCity($timezoneInCity){
		$FullNowDateInCity = date('d.m.Y H:i', (time()+$timezoneInCity*60*60));
		return $FullNowDateInCity;
	}


	public function show_all_news() {
		$news = DB::table('articles')
        ->join('users', 'articles.login_id', '=', 'users.id')
        ->select('articles.id', 'articles.rubric', 'articles.login_id', 'articles.article_date', 'articles.article_title', 'articles.article_short_text', 'articles.article_full_text', 'articles.image', 'articles.count_of_likes', 'users.name')
        ->orderBy('articles.article_date')
        ->get();
        return view('layouts/news', ['name' => 'show_short_news', 'news' => $news]);
	}

	public function show_all_news_by_likes() {
		$news = DB::table('articles')
		->join('users', 'articles.login_id', '=', 'users.id')
        ->select('articles.id', 'articles.rubric', 'articles.login_id', 'articles.article_date', 'articles.article_title', 'articles.article_short_text', 'articles.article_full_text', 'articles.image', 'articles.count_of_likes', 'users.name')
        ->orderBy('articles.count_of_likes', 'desc')
        ->get();
        return view('layouts/news', ['name' => 'show_short_news', 'news' => $news]);
	}

	public function show_article($number) {
		$news = DB::table('articles')
        ->join('users', 'articles.login_id', '=', 'users.id')
        ->select('articles.id', 'articles.rubric', 'articles.login_id', 'articles.article_date', 'articles.article_title', 'articles.article_short_text', 'articles.article_full_text', 'articles.image', 'articles.count_of_likes', 'users.name')
        ->where('articles.id', '=', $number)
        ->orderBy('articles.article_date')
        ->get();
        return view('layouts/news', ['name' => 'show_news', 'news' => $news]);
	}

	public function show_selected_rubricOfNews($rubric) {
		$news = DB::table('articles')
        ->join('users', 'articles.login_id', '=', 'users.id')
        ->select('articles.id', 'articles.rubric', 'articles.login_id', 'articles.article_date', 'articles.article_title', 'articles.article_short_text', 'articles.article_full_text', 'articles.image', 'articles.count_of_likes', 'users.name')
        ->where('rubric', '=', $rubric)
        ->orderBy('articles.article_date')
        ->get();
        return view('layouts/news', ['name' => 'show_news', 'news' => $news]);
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
		return view('main');	
	}
	
	public function edit_article_get(Request $request, $number) {
		$session_login_id = Auth::id();
		$login_id = $request->input('login_id'); 
		if  ($login_id == $session_login_id) {
			$news = DB::select("SELECT * FROM articles WHERE id=:id and login_id=:login_id", ['id' => $number, 'login_id' => $session_login_id]); 
		    return view('layouts/news', ['name' => 'edit_news', 'news' => $news, 'number' => $number]);
	    }
		else {
			echo "У вас нет прав на совершение этих действий";
		}
	}

	public function edit_article_post(Request $request, $number) {
		$article_id = $number; 
		$login_id = Auth::id();
		//$rubric	= $request->input('rubric');
		$article_title = $request->input('article_title');	
		$article_short_text	= $request->input('article_short_text');
		$article_full_text = $request->input('article_full_text');
		
		$this->validate($request, [
			//'rubric' => 'required',
		    'article_title' => 'required|max:50', 
		    'article_short_text' => 'required|max:500',
		    'article_full_text' => 'required|max:5000',  
	  	]); 

		$result = DB::update("UPDATE articles SET article_title =:article_title, article_full_text =:article_full_text, article_short_text =:article_short_text  WHERE id =:id and login_id =:login_id", ['article_title' => $article_title, 'article_full_text' => $article_full_text, 'article_short_text' => $article_short_text, 'id' => $article_id, 'login_id' => $login_id]); //note_date=:note_date,'rubric' => $rubric, 
		
		echo "Запись обновлена"; //view after post
		return view('main');
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
		return view('main');
	}

	public function delete_like() {
		//
	}
}
