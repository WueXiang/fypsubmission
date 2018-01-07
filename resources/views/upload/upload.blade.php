<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Report Upload</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>
	<br>
	<div class="col-lg-offset-4 col-lg-4">
		<center><h1>Upload a File</h1></center>
		<form action="/store" enctype="multipart/form_data" method="post">
		{{csrf_field()}}
			<input type="file" name="report">
			<br>
			<input type="submit" value="Upload">
		</form>
			

	</div>

</body>
</html>