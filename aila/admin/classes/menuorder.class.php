<?php
include_once('connection.class.php');
class MenuOrder extends connection{
	public function __construct(){
		parent::__construct();		
	}
	
	
	public function insert($order_id,$menu_id,$qty){
			$this->sql="INSERT INTO tbl_menu_order (`order_id`,`menu_id`,`quantity`) VALUES ('$order_id',$menu_id,$qty)";
			$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
			
	}
}


?>