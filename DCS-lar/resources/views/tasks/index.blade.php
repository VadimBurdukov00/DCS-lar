
@extends('layout')
@section('content')

<script src="/js/tasks/custom.js"></script>
<div class="container">
  	<div class="row">
	  	<div class="col-sm-6">
			<form id="searchForm" method = "get" action="">
			 	<input type="text" name="search" <?if ($search): ?> value="<?=$search?>"<?endif;?> class="form-control">
				 <input type="submit" value="Искать"  class="form-control mr-sm-2">
			</form>
	 	</div>
	 	<div class="col-sm-6 ">
	  		<button id="addTask"  class="btn btn-primary more-button"> Добавить</button>
		</div> 
	</div> 
</div>
<div class="container">
	@if($search)
			Результаты по запросу: {{$search}}<br>
			<a href="/tasks"  class="btn btn-primary more-button">Сбросить фильтр</a>
	@endif
</div>
<div class = "container main">
	@foreach($Tasks as $Task)
	<div class="row">
		<div class="col-sm-6">
			<div class="task">
				Название: {{$Task -> name}}<hr>
				Описание:
				{{$Task->desc}}<br>
				Статус
				{{$Task->staus}}<hr>

				Исполнители: 
				{{$Task->doers()->pluck('name')->implode(', ')}}

				<button id="del" attr-id="{{$Task->id}}" class="btn btn-primary more-button">Удалить</button>
				<a href="/tasks/editTask/{{$Task->id}}" class="btn btn-primary more-button">Редактировать</a>
				<br><br><br>
			</div>
		</div>
	</div>				
	@endforeach
</div>	
@endsection
