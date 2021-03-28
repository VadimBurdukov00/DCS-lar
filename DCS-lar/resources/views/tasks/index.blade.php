@foreach($Tasks as $Task)
<div class="row">
	<div class="col-sm-6">
		<div class="doer">
		Название: {{$Task -> name}}<hr>
		Описание:
		{{$Task->desc}}<br>
		Статус
		{{$Task->staus}}<hr>
		Исполнители: 
		{{$Task->doers()->pluck('name')->implode(', ')}}

		<a href="/tasks/delete/{{$Task->id}}" class="btn btn-primary more-button">Удалить</a>
		<!-- <button id="del" attr-id="{{$Task->id}}" class="btn btn-primary more-button">Удалить</button> -->
		<a href="/tasks/editTask/{{$Task->id}}" class="btn btn-primary more-button">Редактировать</a>
		<br><br><br>
</div>
				
@endforeach