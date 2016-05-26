<?php
include_once('connection.class.php');
class Order extends connection{
	private $user_id;
	private $order_id;
		
	public function __construct(){
		parent::__construct();		
	}
	
	
	public function insert($user_id){
			$this->sql="INSERT INTO tbl_order (`user_id`) VALUES ('$user_id')";
			$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
			
			if($this->affRows>0){
				return $this->conxn->insert_id;
			}
			else{
				return -1;
			}
	}
}


?>