<div class="container">
  	<div class="row">
  		<div class="col-sm-12">	
			<form id="contactform" method = "post" action="/tasks/save">
				{{ csrf_field() }}
				<div>
					<label>Название</label>
					 <input type="text" name="name" class="form-control">
				</div>

				<div>
					<label>Исполнители</label>
					@foreach($Doers as $Doer)
					 	<input type="checkbox" name="doers[]" value={{$Doer->id}}>
						<label >{{$Doer->name}}</label>
					@endforeach
				</div>
			<?// КАК-ТО НУЖО ПОЛУЧИТЬ ID ЮЗЕРОВ?>
				<div>
					<label>Статус</label>
				 	
						<input type="text" name="status" class="form-control">
					
				</div>

				<div>
					<label>Опсиание</label>
					 <input type="text" name="desc" class="form-control "><br>
				</div>

				<div>
					 <input type="submit" value="Добавить" class="btn btn-primary more-button">
				</div>

			</form>
		</div>
	</div>
</div>
<script src="/js/custom.js"></script>