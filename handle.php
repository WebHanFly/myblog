<?php 
require_once "mysqli.class.php";
$changetitle = $_POST['title'];
$changecontent = $_POST['content'];
$changetime = date("Y-m-d H:i:s");
$id = $_POST['id'];
$mysqli = MysqliClass::getsingle(array(
     'host'=>'127.0.0.1',
     'username'=>'root',
     'pwd'=>'root',
     'dbname'=>'mes',
     'charset'=>'utf8'
	)); 
$changgesql = "update mes_info set title = '". $changetitle ."',"." content = '". $changecontent ."', addtime = '".$changetime ."' where id = ".$id;
 // echo $changgesql;
$res = $mysqli->dml($changgesql);
if($res){
	echo "<script>alert('修改成功');
         window.location.href = 'check.php';
	</script>";
}else{
	echo "<script>alert('修改失败');
         window.location.href = 'check.php';
	</script>";
}











 ?>