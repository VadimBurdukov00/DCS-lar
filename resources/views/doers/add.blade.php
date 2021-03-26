<div class="container">
  	<div class="row">
  		<div class="col-sm-12">		
			<form id="doerAdd" method = "post" action="">
				{{ csrf_field() }}
				<div>
					<label>Имя</label>
					 <input type="text" name="FCs"  class="form-control">
				</div>

				<div>
					<label>Должность</label>
					 <input type="text" name="post"  class="form-control">
				</div>

				<div>
					 <input type="submit" value="Добавить" class="btn btn-primary more-button">
				</div>

			</form>
		</div>
	</div>
</div>
<script src="/js/doers/doers.js"></script>