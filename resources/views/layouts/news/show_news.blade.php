<!-- Вывод новостей на экран -->
@foreach ($news as $row)
	<br> 
	<p><h2>{{ $row->article_date }}</h2></p>
	<p><h2>Автор: {{ $row->name }}</h2></p>
	<p><h2>{{ $row->rubric }}</h2></p>
	<p><h2>{{ $row->article_title }}</h2></p>
	<img src="{{asset('/images/' .  $row->image) }}"><br>
	{{ $row->article_short_text }} <br><br>
	{{ $row->article_full_text }} <br>
		
	<form method="post" action= "{{ route('add_like') }}">
		{{ csrf_field() }} 
		<input type='hidden' name="article_id" value="{{ $row->id }}">
		<input type='hidden' name="like" value="{{ $row->count_of_likes }}">
		<button  name="image_go" value="image_go" type="submit" style="background: #fdeaa8; border: none; margin: 0; padding: 0; border-radius: 0px"><img src="{{asset('/images/like.jpg')}}"  width="100" height="40"></button> <b>{{ $row->count_of_likes }}</b>
	</form>


	<form method="post" action= "{{ route('delete_article_with_post') }}">
		{{ csrf_field() }} 
		<input type='hidden' name="login_id" value="{{ $row->login_id }}">
		<input type='hidden' name="delete_id" value="{{ $row->id }}">
		<input name="button_del" value="Удалить" type="submit">
	</form>

	<form method="post">
		{{ csrf_field() }} 
		<a href="<?php echo route('get_update_article', ['number' => $row->id, 'login_id' => $row->login_id]); ?>">Отредактировать</a>
	</form>
	<a href="{{ route('show_article', ['number' => $row->id]) }}">Подробнее</a>

	
@endforeach







