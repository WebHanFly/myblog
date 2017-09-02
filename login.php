<?php 
require_once "mysqli.class.php";
$mysqli = MysqliClass::getsingle(array(
     'host'=>'127.0.0.1',
     'username'=>'root',
     'pwd'=>'root',
     'dbname'=>'mes',
     'charset'=>'utf8'
	));
// $sql = "select * from mes_info ";
// $res = $mysqli->dql($sql);          //$res是个二维数组； 


// $data = array();
// while($row = $res->fetch_row()){
//     print_r ($row[0]);
// }
// var_dump($data);


$sql = "INSERT INTO mes_info VALUES ('','ceshi1','ceshi2','1995-09-09')";
// $sql = "delete from mes_info where id > 2";
$res = $mysqli->dml($sql);













 ?>