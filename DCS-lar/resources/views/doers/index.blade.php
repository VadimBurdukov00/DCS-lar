@foreach($Doers as $Doer)
<div class="row">
	<div class="col-sm-6">
		<div class="doer">
		Имя: {{$Doer -> name}}<hr>
		Должность:
		{{$Doer->post}}<hr>

		{{$Doer->tasks()->pluck('name')->implode(', ')}}
		<button id="del" attr-id="{{$Doer->id}}" class="btn btn-primary more-button">Удалить</button>
		<a href="/doers/editDoer/{{$Doer->id}}" class="btn btn-primary more-button">Редактировать</a>
		<br><br><br>
</div>
				
@endforeach