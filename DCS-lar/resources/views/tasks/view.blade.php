@extends('layout')
@section('content')
<div class="container">
  	<div class="row">
  		<div class="col-sm-12">	
			<form id="editForm" method = "post" action="/tasks/update">

				 <input type="hidden" name="id" value={{$Task-> id}}>
				<div>
					<label>Имя</label>
					 <input type="text" name="name" class="form-control" value={{$Task-> name}} >
				</div>

				<div>
					<label>Задействованные исполнители:</label><br>
					@foreach($Doers as $Doer)
						<input type="checkbox" name="doers[]" value="{{$Doer->id}}"
						@if($Task->doers()->where('id', $Doer->id)->count()) 
							checked="checked"	
						@endif
						>
							{{$Doer->name}}<br>
					@endforeach
				</div><hr>
				<div>
					<label>	Cтатус</label>
					<input type="text" value="{{$Task->staus}}">
				</div>

				<div>
					<label>	Описание</label>
					 <input type="text" name="desc"class="form-control"  value={{$Task->desc}}><br>
				</div>

				<div>
					 <input type="submit" class="btn btn-primary more-button" value="Сохранить">
				</div>

			</form>
		</div>
	</div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/tasks/custom.js"></script>
