@extends('layout')
@section('content')

<div class="container">
  	<div class="row">
  		<div class="col-sm-6"></div>
  	 	<div class="col-sm-6 ">
	      <button id="doerAddBtn"  class="btn btn-primary more-button"> Добавить</button>
		</div> 
	</div> 
</div>
<div class = "container">
	@foreach($Doers as $Doer)
		<div class="row">
	  		<div class="col-sm-6">
				<div class="doer">
				Имя: {{$Doer -> FCs}}<hr>
				Должность:
				{{$Doer->post}}<hr>
				<button id="del" attr-id="{{$Doer->id}}" class="btn btn-primary more-button">Удалить</button>
				<a href="/doers/editDoer/{{$Doer->id}}" class="btn btn-primary more-button">Редактировать</a>
				<br><br><br>
			</div>
				
			@endforeach
@endsection

</body>
</html>