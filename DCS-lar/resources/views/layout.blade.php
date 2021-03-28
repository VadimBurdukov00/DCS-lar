<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.14/dist/jBox.all.min.js"></script>
	<link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.14/dist/jBox.all.min.css" rel="stylesheet">

	
</head>
<body>
	<header class="mt-2 mb-2" >
	    <div class="container">
	        <div class="row">
	            <div class="col-md-1 ">
	                <a href="/tasks"  class="btn btn-primary more-button">Задачи</a>
	            </div>
	            <div class="col-md-1 ">
	                <a href="/doers" class="btn btn-primary more-button">Исполнители</a>
		        </div>
	            </div>
	        </div>
	    </div>
	</header>
	    

	@yield('content')
</body>
</html>


	