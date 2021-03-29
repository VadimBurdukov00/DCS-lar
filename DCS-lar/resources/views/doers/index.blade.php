@extends('layout')
@section('content')
<div class="container">
  	<div class="row">	
<div class="col-sm-6 ">
	<button id="addDoer"  class="btn btn-primary more-button"> Добавить</button -->
</div> 
</div> 
</div> 
<div class = "container doers">

@foreach($Doers as $Doer)
	<div class="row">
		<div class="col-sm-6">
			<div class="doer">
				<div class="name">Имя: {{$Doer -> name}}<hr></div> 
				<div class="post">Должность:{{$Doer->post}}</div>
				
				<button id="del" attr-id="{{$Doer->id}}" class="btn btn-primary more-button">Удалить</button>

				<a href="/doers/editDoer/{{$Doer->id}}" class="btn btn-primary more-button">Редактировать</a>
				<br><br><br>
			</div>
		</div>	
	</div>		
@endforeach
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="/js/doers/doers.js"></script>