<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑查看板</title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0-beta/css/bootstrap-grid.css"> <!-- 引入bootstrap -->
	
	<script src=""></script><!-- 引入holder.min.js -->
</head>
<?php 
require_once "mysqli.class.php";
$mysqli = MysqliClass::getsingle(array(
     'host'=>'127.0.0.1',
     'username'=>'root',
     'pwd'=>'root',
     'dbname'=>'mes',
     'charset'=>'utf8'
	));
$page = 2;
$currentpage = isset($_GET['currentpage']) ? $_GET['currentpage'] : '1';
// echo $currentpage;
$sql1 = "select count(*) from mes_info ";
$res1 = $mysqli->dql($sql1);
$count = $res1->fetch_row();
 // var_dump ($count[0]);
 // exit;
$total = $count[0];             //获取数据总共的条数
$max = ceil($total/$page);
$arr = array();

$sql = "select * from mes_info LIMIT ".($currentpage-1)*$page.",".$page;
$res = $mysqli->dql($sql);

 ?>
<div class="container">
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a href="index.html" class="navbar-brand">留言板</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
			<ul class="nav navbar-nav">
				<li><a href="#">最新留言</a></li>
			</ul>
		</div> <!-- navbar-collapse -->
	</nav>
</div> <!-- container -->
<?php foreach($res as $value): ?>
 <div class="col-md-9">
 <form action="action.php" method="post" role="form">
		<div class="from-group">
			<label>主题</label>
			<input type="text" class="form-control" name="title" value="<?php echo ($value['title']); ?>"/>
		</div>
		<div class="from-group">
			<label>留言内容</label>
			<textarea name="content" id=""  rows="10" ><?php echo ($value['content']); ?></textarea>

		</div>
		<div><?php echo ($value['addtime']); ?></div>
		<!-- <a href="action.php"></a> -->
		<input type="submit" class="btn btn-default" value="修改">
		<!-- <input type="submit" class="btn btn-default" value="删除"> -->
		<a href="delete.php?id=<?php echo($value['id']);?>">删除</a>
		<input type="hidden" name = "id" id = "hidden" value = "<?php echo ($value['id']); ?>">
	</form>

</div>
<?php endforeach; ?>
<a href="check.php?currentpage=1">首页</a>
<a href="check.php?currentpage=<?php if($currentpage > 1){echo $currentpage-1;}else{echo '1';} ?>">上一页</a>
<a href="check.php?currentpage=<?php if($currentpage < $max ){echo $currentpage+1;}else{echo $max;} ?>">下一页</a>
<a href="check.php?currentpage=<?php if($currentpage <= $max ){echo $max;} ?>">末页</a>

<body>
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script><!-- 引入jQuery.min.js -->
	<script src="https://cdn.bootcss.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script><!-- 引入bootstrap.min.js -->
</body>
</html>