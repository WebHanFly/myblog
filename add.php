<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板</title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0-beta/css/bootstrap-grid.css"> <!-- 引入bootstrap -->
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script><!-- 引入jQuery.min.js -->
	<script src="https://cdn.bootcss.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script><!-- 引入bootstrap.min.js -->
	<script src=""></script><!-- 引入holder.min.js -->
</head>
<div class="container">
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a href="index.html" class="navbar-brand">留言板</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
			<ul class="nav navbar-nav">
				<li><a href="#">发布留言</a></li>
			</ul>
		</div> <!-- navbar-collapse -->
	</nav>
</div> <!-- container -->
<div class="col-md-9">
	<form action="insert.php" method="post" role="form">
		<div class="from-group">
			<label>留言主题</label>>
			<input type="text" class="form-control" name="title"/>
		</div>
		<div class="from-group">
			<label>留言内容</label>
			<textarea name="content" id=""  rows="10"></textarea>

		</div>
		<input type="submit" class="btn btn-default" value="发表">
	</form>
</div>
<body>
	
</body>
</html>