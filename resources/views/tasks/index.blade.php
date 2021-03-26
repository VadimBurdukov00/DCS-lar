@extends('layout')
@section('content')

<div class="container">
  <div class="row">
  	<div class="col-sm-6">
      	<form id="searchForm" method = "post" action="">

			 	<input type="text" name="searchParam" <?if ($search): ?> value="<?=$search?>"<?endif;?> class="form-control">

				 <input type="submit" value="Искать"  class="form-control mr-sm-2">

		</form>
    </div>
    <div class="col-sm-6 ">
      <button id="myModal"  class="btn btn-primary more-button"> Добавить</button>
	</div> 
  </div> 
</div>
	

<div class="container">
	@if($search)
		Результаты по запросу: {{$search}}<br>
		<a href="/tasks"  class="btn btn-primary more-button">Сбросить фильтр</a>
	@endif
</div>
<div class = "container">
	@foreach($Tasks as $Task)
	 <div class="row">
  		<div class="col-sm-6">
			<div class="task">
				<input type="hidden" class="curId" attr-id="0">
				Название: {{$Task -> name}}
				<hr>

				Статус: {{$Task->status}}<br>
				Описание: {{$Task -> desc}}
				<br>
				Исполнители:
				@foreach($Groups as $Group)
					@if($Group->TaskId == $Task->id)
						<br>{{$Group->FCs}}
					@endif 
				@endforeach<hr>
				<button id="del" attr-id="{{$Task->id}}"  class="btn btn-primary more-button"> Удалить</button>
				<a href="/tasks/editTask/{{$Task->id}}"  class="btn btn-primary more-button">Редактировать</a>
				<br><br><br>
			</div>
		</div>	
	</div>
	@endforeach
</div>
@endsection
