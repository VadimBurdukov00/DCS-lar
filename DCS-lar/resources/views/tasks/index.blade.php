<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<script src="/js/doers/doers.js"></script>
	<script src="/js/tasks/custom.js"></script>
</head>
<body>
<form id="searchForm" method = "get" action="">
 	<input type="text" name="search" <?if ($search): ?> value="<?=$search?>"<?endif;?> class="form-control">
	 <input type="submit" value="Искать"  class="form-control mr-sm-2">

</form>
@if($search)
		Результаты по запросу: {{$search}}<br>
		<a href="/tasks"  class="btn btn-primary more-button">Сбросить фильтр</a>
@endif


<div class="col-sm-6 ">
  	<!--button id="myModal"  class="btn btn-primary more-button"> Добавить</button -->
  	<a href="/tasks/addTask"> Добавить</a>
</div> 
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

</body>
</html>