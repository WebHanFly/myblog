<?php 
require_once "mysqli.class.php";

$username = $_GET['username'];
$pwd = $_GET['pwd'];

$mysqli = MysqliClass::getsingle(array(
     'host'=>'127.0.0.1',
     'username'=>'root',
     'pwd'=>'root',
     'dbname'=>'mes',
     'charset'=>'utf8'
	));

$sql = "select password from login where username = '".$username."'";
// echo $sql;
$res = $mysqli->dql($sql);
// var_dump($res);
// echo md5("$pwd")."<hr/>";

$row = $res->fetch_assoc();
// echo $row['password'];

 // exit;
    if($row['password'] == md5("$pwd")){
       echo "<script>
             window.location.href = 'check.php'; 
       </script>";
    }else{
    	echo "<script>
    	alert('登录失败')
             window.location.href = 'index.php'; 
       </script>";
    }









 ?>
