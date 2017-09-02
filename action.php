<?php 
require_once "mysqli.class.php";

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$mysqli = MysqliClass::getsingle(array(
     'host'=>'127.0.0.1',
     'username'=>'root',
     'pwd'=>'root',
     'dbname'=>'mes',
     'charset'=>'utf8'
	));

$sql = "select * from mes_info where id = ".$id;
$res = $mysqli->dql($sql);
?>
 
<?php foreach($res as $value): ?>
 <div class="col-md-9">
 <form action="handle.php" method="post" role="form">
		<div class="from-group">
			<label>主题</label>
			<input type="text" class="form-control" name="title" value="<?php echo ($value['title']); ?>"/>
		</div>
		<div class="from-group">
			<label>留言内容</label>
			<textarea name="content" id=""  rows="10" ><?php echo ($value['content']); ?></textarea>

		</div>
		<div><?php echo ($value['addtime']); ?></div>
		<input type="submit" class="btn btn-default" value="确定">
		<input type="hidden" name = "id" id = "hidden" value = "<?php echo ($value['id']); ?>">
	</form>

</div>
<?php endforeach; ?>














 