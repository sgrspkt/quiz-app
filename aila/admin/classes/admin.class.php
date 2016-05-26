<?php
//session_start();
class Admin extends connection{
	private $admin_id;
	private $admin_username;
	private $admin_password;
	
	
	public function __construct(){
		parent::__construct();
	}
	
	public function setAdminID($ad=''){
		$this->admin_id=$ad;
	}
	
	public function setUsername($ue=''){
			$this->admin_username=$ue;
	}
	public function setPassword($ad=''){
		$this->admin_password=$ad;
	}
		
	//---------------adding the admin-----------------
	public function addAdmin(){
		$this->sql="INSERT into tbl_admin (admin_id,admin_username,admin_password) VALUES('$this->admin_id','$this->admin_username','$this->admin_password')";
					 /*echo $this->sql;
					 exit;*/
					 $this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
					 $this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
					 /*echo $this->affRows;
					 exit;*/
	
					if($this->affRows>0){
						return true;
					}
					else{
						return false;
					}
	}
	
	
	//---------------------validate admin --------------------------------//
public function validateAdmin(){
	$this->sql="SELECT * FROM tbl_admin WHERE admin_username='$this->admin_username' AND admin_password='$this->admin_password' ";
	$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
	$this->numRows=mysqli_num_rows($this->res);
	$this->row=array();
	//echo $this->numRows;
	
    if($this->numRows>0){
		$row=mysqli_fetch_assoc($this->res);
		$_SESSION['admin_username']=$row['admin_username'];
		$username=$_SESSION['admin_username'];
		$_SESSION['id']=$row['admin_id'];
		$user_id=$_SESSION['admin_id'];

	return true;
		//return $this->numRows;

	}
	else{
		return false;
			//return $this->numRows;
	
	}
}
}
?>