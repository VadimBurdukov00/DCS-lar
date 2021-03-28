<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="/js/doers/doers.js"></script>

	<script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.14/dist/jBox.all.min.js"></script>
	<link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.14/dist/jBox.all.min.css" rel="stylesheet">
</head>
<body>
<div class="col-sm-6 ">
	<button id="addDoer"  class="btn btn-primary more-button"> Добавить</button -->
</div> 
@foreach($Doers as $Doer)
	<div class="row">
		<div class="col-sm-6">
			<div class="doer">
				Имя: {{$Doer -> name}}<hr>
				Должность:
				{{$Doer->post}}<hr>
				<button id="del" attr-id="{{$Doer->id}}" class="btn btn-primary more-button">Удалить</button>
				<!--a href="/doers/delete/{{$Doer->id}}" class="btn btn-primary more-button">Удалить</a -->
				<a href="/doers/editDoer/{{$Doer->id}}" class="btn btn-primary more-button">Редактировать</a>
				<br><br><br>
			</div>
		</div>	
	</div>		
@endforeach
</body>
</html>
