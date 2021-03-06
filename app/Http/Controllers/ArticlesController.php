<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\UploadedFile;
use Session;
use App\Article;


class ArticlesController extends Controller
{
	public $modelArticle;
	public function __construct() {
		$this->modelArticle = new Article();
	}

	public function create_article(Request $request) {
	    //adding in database: picture and text information, which the user uploaded; date,calculated using the function 
		if ($request->isMethod("post")) { //if(isset($_POST["go"]))
			//Adding the picture on the server, and a link of picture in the database
			$this->validate($request, [
					'rubric' => 'required',
				    'article_title' => 'required|max:50', //если не пустое значение параметра.Проверка на наличие только букв, цифр, тире и символа подчеркивания
				    'article_short_text' => 'required|max:500',
				    'article_full_text' => 'required|max:5000',
				    //'userfile' => 'required' //file|max:5120|mimes:jpg,gif,png
			]); 

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

				// Adding information in the database
				DB::insert("INSERT INTO articles (rubric, article_title, article_date, image, article_short_text, article_full_text, count_of_likes, login_id) VALUES (:rubric, :article_title, :article_date, :image, :article_short_text, :article_full_text, :count_of_likes, :login_id)", ['rubric' => $rubric, 'article_title' => $article_title, 'article_date' => $article_date, 'image' => $image, 'article_short_text' => $article_short_text, 'article_full_text' => $article_full_text, 'count_of_likes' => '0', 'login_id' => $login_id]); 

				$arr = (['article_title' => $request->input('article_title'), 
				'status' => 'Запись ', 'status_end' => 'добавлена', 'new' => $request->hasfile('userfile')])
				;
				return json_encode($arr); 
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
		$news = $this->modelArticle->show_all_news();
        return view('layouts/news', ['name' => 'show_short_news', 'news' => $news]);
	}

	public function show_all_news_by_likes() {
		$news = $this->modelArticle->show_all_news_by_likes();
        return view('layouts/news', ['name' => 'show_short_news', 'news' => $news]);
	}

	public function show_article($number) {
		$news = $this->modelArticle->show_article($number);
        return view('layouts/news', ['name' => 'show_news', 'news' => $news]);
	}

	public function show_selected_rubricOfNews($rubric) {
		$news = $this->modelArticle->show_selected_rubricOfNews($rubric);
        return view('layouts/news', ['name' => 'show_news', 'news' => $news]);
	}

	public function delete_article(Request $request) {
		$this->modelArticle->delete_article($request);
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
		$this->modelArticle->add_like($request);
		return view('main');
	}

	public function delete_like() {
		//
	}
}
