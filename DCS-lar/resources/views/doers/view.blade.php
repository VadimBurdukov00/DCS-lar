@extends('layout')
@section('content')
<div class="container">
  	<div class="row">
  		<div class="col-sm-12">
			<form id="editForm" method = "post" action="/doers/update">
				{{ csrf_field() }}

			 	<input type="hidden" name="id" class="form-control" value={{$Doer-> id}} >
				<div>

					<label>ФИО: </label>
					<textarea name="name" cols="30" rows="1" class="form-control">{{$Doer-> name}}</textarea>
				</div>

				<div>
					<label>	Должность</label>
					<textarea name="post" class="form-control" cols="30" rows="1">{{$Doer->post}}</textarea>
				</div>

				<div>
					 <br><input type="submit" class="btn btn-primary more-button" value="Сохранить">
				</div>
			</form>
		<div>
	<div>
<div>
	@endsection
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="/js/doers/doers.js"></script>

