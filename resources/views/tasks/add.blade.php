<div class="container">
  	<div class="row">
  		<div class="col-sm-12">	
			<form id="contactform" method = "post" action="">
				{{ csrf_field() }}
				<div>
					<label>Название</label>
					 <input type="text" name="name" class="form-control">
				</div>

				<div>
					<label>Исполнитель</label>
					 <select name="doerIds[]" required multiple  class="form-control">
						@foreach($Doers as $Doer)
							<option value={{$Doer->id}}>{{$Doer->FCs}}</option>
						@endforeach
					</select>
				</div>
			<?// КАК-ТО НУЖО ПОЛУЧИТЬ ID ЮЗЕРОВ?>
				<div>
					<label>Статус</label>
				 	<select name="status" class="form-control">
						@foreach($Statuses as $Status)
							<option value={{$Status->id}}>{{$Status->status}}</option>
						@endforeach
					</select>
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