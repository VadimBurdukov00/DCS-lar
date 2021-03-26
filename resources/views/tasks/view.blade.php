@extends('layout')
@section('content')
<div class="container">
  	<div class="row">
  		<div class="col-sm-12">	
			<form id="editForm" method = "post" action="">
				{{ csrf_field() }}

				 <input type="hidden" name="id" value={{$Task-> id}}>
				<div>
					<label>Имя</label>
					 <input type="text" name="name" class="form-control" value={{$Task-> name}} >
				</div>

				<div>
					<label>Задействованные исполнители:</label>
						@foreach($UsedDoers as $UsedDoer)
							<hr>{{$UsedDoer->FCs}}<hr>
						@endforeach
				</div>
				@if(count($Doers))
					<div>
						<label>Добавить исполнителя:</label>
						
						 	<select name="doerIds[]" multiple class="form-control">
								@foreach($Doers as $Doer)
									<option value={{$Doer->id}}> {{$Doer->FCs}}</option>
								@endforeach
							</select>
						
					</div>
				@endif
				<div>
					<label>	Cтатус</label>
					<select name="status"class="form-control">
						@foreach($Statuses as $Status)
							<option value={{$Status->id}} <?if ($Task->status == $Status->id):?> selected <?endif;?>>{{$Status->status}}</option>
						@endforeach
					</select>
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
