<div class="container">
  	<div class="row">
  		<div class="col-sm-12">	
			<form id="newDoer" method = "post" action="/doers/save">
				{{ csrf_field() }}
				<div>
					<label>Имя</label>
					 <input type="text" name="name" class="form-control" required>
				</div>

				<div>
					<label>Должность</label>
					 <input type="text" name="post" class="form-control" required><br>
				</div>

				<div>
					 <input type="submit" value="Добавить" class="btn btn-primary more-button">
				</div>

			</form>
		</div>
	</div>
</div>	