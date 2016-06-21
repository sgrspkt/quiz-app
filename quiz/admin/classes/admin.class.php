<?php
//session_start();
class Admin extends connection{
	private $admin_id;
	private $admin_username;
	private $admin_password;
	private $admin_role;
	private $created_at;
	private $updated_at;
	
	
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
	public function setAdminRole($ar=''){
		$this->admin_role=$ar;
	}
	public function setCreatedAt($ca=''){
		$this->created_at=$ca;
	}
	public function setUpdatedAt($ua=''){
		$this->updated_at=$ua;
	}
	
		
	//---------------adding the admin-----------------
	public function addAdmin(){
		$this->sql="INSERT into tbl_admin (admin_id,username,password,role,created_at,updated_at) VALUES('$this->admin_id','$this->admin_username','$this->admin_password','$this->admin_role','$this->created_at','$this->updated_at')";
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
	
		$this->sql="SELECT * FROM tbl_admin WHERE username='$this->admin_username' AND password='$this->admin_password' ";
	
/*die();*/
	$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
	$this->numRows=mysqli_num_rows($this->res);
	$this->row=array();
	$this->numRows;
	
    if($this->numRows>0){
		$row=mysqli_fetch_assoc($this->res);
		/*echo '<pre>';
		print_r($row);
		echo '</pre>';
		die();*/
		$_SESSION['username']=$row['username'];
		$username=$_SESSION['username'];
		$_SESSION['admin_id']=$row['admin_id'];
		$this->admin_id=$_SESSION['admin_id'];

	return true;
		//return $this->numRows;

	}
	else{
		return false;
			//return $this->numRows;
	
	}
}
//------------------view Category section ------------------------//
		public function viewAdmin(){
			
			$this->sql="SELECT * FROM tbl_admin";
			
			//echo $this->sql;exit;
			$this->res=mysqli_query($this->conxn,$this->sql);// or trigger_error($this->err=mysqli_error($this->conxn));
			$this->numRows=mysqli_num_rows($this->res);// or trigger_error($this->err=mysqli_error($this->conxn));
			$this->data=array();
			
			if($this->numRows>0){
				while($this->row=mysqli_fetch_assoc($this->res)){
					array_push($this->data,$this->row);
				}
				
				}
		return $this->data;
		
}

}
?>