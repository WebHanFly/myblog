<?php 
 // header("Content-type:text/html;charset = utf-8");
require_once "mysqli.class.php";
$mysqli = MysqliClass::getsingle(array(
     'host'=>'127.0.0.1',
     'username'=>'root',
     'pwd'=>'root',
     'dbname'=>'mes',
     'charset'=>'utf8'
	));
// exit;
 // $sql = "select * from mes_info";
 // $res = $mysqli->query($sql);
 // var_dump($res);

 // var_dump($mysqli);
 // exit;
$title = $_POST['title'];
$content = $_POST['content'];
$addtime = date("Y-m-d H:i:s");   //2016-8-21 22:50:20;
// echo $addtime;
if($title == ""||$content == ''){
	// echo "标题不能为空！";
	echo "<script>alert('标题不能为空！');
         window.location.href = 'add.php';
	</script>";
	exit;
}
// $conn = mysqli_connect('127.0.0.1','root','root');
// mysqli_select_db("mes");
// mysqli_query("set names utf8");
$sql = "insert into mes_info values('','{$title}','{$content}','{$addtime}')";
$res = $mysqli->dml($sql);

//判断是否成功给你
if(!$res){
	echo "<script>alert('添加失败');
        
	</script>";
}else{
	echo "<script>alert('添加成功');
         window.location.href = 'add.php';
	</script>";
}








 ?>