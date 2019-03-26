
@if($articles)

<div id="content-page" class="content group">
	<div class="hentry group">
		<h2>Добавленные статьи</h2>
		<div class="short-table white">
			<table style="width: 100%" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th class="align-left">ID</th>
						<th>Заголовок</th>
						<th>Текст</th>
						<th>Изображение</th>
						<th>Категория</th>
						<th>Псевдоним</th>
						<th>Действие</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($articles as $article)
<tr>
	<td class="align-left">{{ $article->id }}</td>
	<td class="align-left"><!-- edit-->
{!! Html::link(route('articles.edit', ['alias'=> $article->alias]), $article->title) !!}
	</td>
	<td class="align-left">{{ str_limit($article->text, 200) }}</td>
	<td>
		@if(isset($article->img->mini))

{!! Html::image(asset(env('THEME')).'/images/articles/'.$article->img->mini) !!}

		@endif
	</td>
	<td>{{ $article->category->title }}</td>
	<td>{{ $article->alias }}</td>
	<td><!-- admin.articles.destroy -->
		{!! Form::open(['url'=>route('articles.index',['articles'=>$article->alias]),
		'class'=>'horizontal', 'method'=>'POST']) !!}
		{{ method_field('DELETE') }}
		{!! Form::button('Удалить', ['class'=>'btn btn-french-5', 'type'=>'submit']) !!}
		
		{!! Form::close() !!}
	</td>
</tr>			
			@endforeach

				</tbody>
			</table><!-- admin.articles.create -->
			<a class="more-button more-button-ltr" href="{{ route('articles.create') }}" title="tick">
				Добавить
				<span class="icon tick">&nbsp;</span>
			</a>
		</div>
	</div>
</div>
@else
<h1>HEllo</h1>
@endif