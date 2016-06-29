<?php
class Connection
{
	private $user;
	private $password;
	private $host;
	private $db;
	public $sql;
	public $res;
	public $affRows;
	public $numRows;
	public $row;
	public $data=array();
	public $conxn;
	public $success;
	public $error;
	
	public function setUser($ur=''){
		$this->user=$ur;
	}
	public function setPassword($pd=''){
		$this->password=$pd;
	}
	public function setHost($ht=''){
		$this->host=$ht;
	}
	public function setDB($db=''){
		$this->db=$db;
	}
	public function setMessage($msg=''){
		$this->msg=$msg;
	}
	public function setRow($rw=''){
		$this->row=$rw;
	}
	public function setSuccess($success=''){
		$this->success=$success;
	}
	public function setError($error=''){
		$this->error=$error;
	}
	public function __construct($ht='localhost',$ur='root',$pd='',$db='quiz'){
		$this->conxn=mysqli_connect($ht,$ur,$pd,$db) or trigger_error($this->err=mysqli_error($this->conxn));
	}
public function __destruct(){
	mysqli_close($this->conxn);
}
}
?>