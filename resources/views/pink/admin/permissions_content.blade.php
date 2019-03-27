<div id="content-page" class="content group">
	<div class="hentry group">
		<h3 class="title_page">Привилегии</h3>
		<form action="{{ route('permissions.store') }}" method="post">
			@csrf
			<div class="short-table white">
				<table style="width:100%">
					<thead>
						<th>Привилегии</th>
@if(!$roles->isEmpty())

	@foreach($roles as $item)
		<th>{{ $item->name }}</th>
	@endforeach

@endif
					</thead>
					<tbody>
@if(!$permissions->isEmpty())
	@foreach($permissions as $value)
		<tr>
			<td>{{ $value->name }}</td>
			@foreach($roles as $role)
				<td>
					@if($role->hasPermission($value->name))
					<input type="checkbox" name="" value="" checked>
					@else
					<input type="checkbox" name="" value="">
					@endif
				</td>
			@endforeach
		</tr>
	@endforeach
@endif
					</tbody>
				</table>
			</div>
<input type="submit" class="btn btn-the-salmon-dance-3" value="Обновить">
		</form>
	</div>
</div>