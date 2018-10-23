<!-- Редактирование записи -->
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif	

@foreach ($news as $row)
	<form method="POST" ENCTYPE="multipart/form-data" accept-charset="UTF-8" action="{{ route('post_update_article', ['number' => $number]) }}">			
		{{ csrf_field() }} 
		Введите название статьи (объемом до 150 знаков): 
		<input type="hidden" name="login_id" value="{{ $row->login_id }}">
		<input type="hidden" name="id" value="{{ $row->id }}">    
		<input type="text" name="article_title" size="52" maxlength="50" value="{{ $row->article_title }}">  
		<br>
		Введите краткий текст статьи (объемом до 500 знаков):  <br>
		<input type="text" name="article_short_text" rows="10" cols="70" maxlength="500" value="{{ $row->article_short_text }}">
		<br>
		Введите полный текст статьи (объемом до 5000 знаков):  <br>
		<input type="text" name="article_full_text" rows="10" cols="100" maxlength="5000" value="{{ $row->article_full_text }} ">
		<br>
		<input type="submit" name="go" value="загрузить на сервер">
	</form>
@endforeach

