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
	public $msg;
	
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
	public function setError($er=''){
		$this->er=$er;
	}
	public function setMessage($msg=''){
		$this->msg=$msg;
	}
	public function __construct($h='localhost',$u='root',$p='',$db='college_project'){
		$this->conxn=mysqli_connect($h,$u,$p,$db) or trigger_error($this->err=mysqli_error($this->conxn));
	}
public function __destruct(){
	mysqli_close($this->conxn);
}
}
?>