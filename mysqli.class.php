<?php 
class MysqliClass{
    private $host;          //定义数据连接
    private $username;      //定义数据库连接用户名
    private $pwd;           //定义用户名连接密码
    private $dbname;        //定义数据库名字
    private $link = null;          //定义数据库连接
    public $charset;          //定义数据库字符集；
    private static $instance;       //单例模式

	private function __construct($config = array()){
		$this->_initOptions($config);
 		$this->_initMysqli();
 	}
	private function _initOptions(array $config){
		$this->host = isset($config['host']) ? $config['host'] : '';
		$this->username = isset($config['username']) ? $config['username'] : '';
		$this->pwd = isset($config['pwd']) ? $config['pwd'] : '';
		$this->dbname = isset($config['dbname']) ? $config['dbname'] : '';
		$this->charset = isset($config['charset']) ? $config['charset'] : '';
		if($this->host == '' || $this->username == '' || $this->pwd == '' || $this->dbname == ''){
			die ("数据库参数不对");
		}
	}
	private function _initMysqli(){
		$this->link = new Mysqli($this->host,$this->username,$this->pwd,$this->dbname);
 		$this->link->set_charset($this->charset);
	}

    public static function  getsingle(array $config = array()){
    	if(!(self::$instance instanceof self)){
           self::$instance = new self($config);
    	}
    	return self::$instance;
    }
    public function dql($sql){
         $link = $this->link;
         // $arr = array();
         if($link){
         	$res = $link->query($sql);
         	// while($row = $res->fetch_assoc()){
         	// 	$arr[] = $row;
         	// }
         	// $res->free();
         }
         return $res;
 	}
    public function dml($sql){
        $link = $this->link;
        if($link){
        	$res = $link->query($sql);
	       	if(!$res){
	       		echo "执行失败".$link->error;
	       		exit;
	       	}
 			if( $link->affected_rows > 0){
	       		// echo "执行成功！".$link->affected_rows;
	       	}else{
	       		// echo "没有受影响的行数！".$link->affected_rows;
	       	}
 		}
 		return $res;
    }
    private function __clone(){} 

    










}

 ?>