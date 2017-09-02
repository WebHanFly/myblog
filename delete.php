<?php 

require_once "mysqli.class.php";
$id = $_GET['id'];
$mysqli = MysqliClass::getsingle(array(
     'host'=>'127.0.0.1',
     'username'=>'root',
     'pwd'=>'root',
     'dbname'=>'mes',
     'charset'=>'utf8'
));
$sql = "delete from mes_info where id = ".$id;
$res = $mysqli->dml($sql);
if($res){
       echo "<script>
       alert('删除成功');
             window.location.href = 'check.php'; 
       </script>";
    }else{
    	echo "登录失败！";
    }















 ?>