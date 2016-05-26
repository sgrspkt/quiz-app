<?php

class User extends connection{
	private $user_id;
	private $fullname;
	private $username;
	private $password;
	private $password_check;
	private $email;
	private $address;
	private $telephone;	
	public $msg;
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function setUserID($ud=''){
		$this->user_id=$ud;
	}
	
	public function setFullname($fn=''){
		$this->fullname=$fn;
	}
		public function setUsername($ue=''){
			$this->username=$ue;
			}
	public function setPassword($pd=''){
		$this->password=$pd;
	}
	public function setCPassword($cpd=''){
		$this->password_check=$cpd;
		}
	public function setEmail($em=''){
		$this->email=$em;
	}
	public function setAddress($as=''){
		$this->address=$as;
	}
	public function setTelephone($te=''){
		$this->telephone=$te;
	}
	public function setMessage($msg=''){
		$this->msg=$msg;
		}
	
	
	//-----------------------------adding the user----------------------------------//
	public function addUser(){
		$this->sql="INSERT into tbl_signup(user_id,fullname,username,password,password_check,email,address,telephone)
					 VALUES('$this->user_id','$this->fullname','$this->username','$this->password','$this->password_check','$this->email','$this->address','$this->telephone')";
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
	
	//------------------------------view user section------------------------------//
	public function viewUser(){
		if(isset($this->user_id)){
			$this->sql="SELECT * FROM tbl_signup WHERE user_id='$this->user_id'";
		}
		else{
		$this->sql="SELECT * FROM tbl_signup ORDER BY username desc";
			}
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->numRows=mysqli_num_rows($this->res);
		$this->data=array();
		if($this->numRows>0){
		while($this->row=mysqli_fetch_assoc($this->res)){
			array_push($this->data,$this->row);
			
		}
		}
		return $this->data;
}

//--------------------------validate user section----------------------------------//
public function validateUser(){
	$this->sql="SELECT * FROM tbl_signup WHERE username='$this->username' AND password='$this->password' "; 
	$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
	$this->numRows=mysqli_num_rows($this->res);
	$query = $this->row=array();
	//echo $this->numRows;
	
    if($this->numRows>0){
		$row=mysqli_fetch_assoc($this->res);
		$_SESSION['user_id'] = $row['user_id'];
	return true;
		//return $this->numRows;

	}
	else{
		return false;
			//return $this->numRows;
	}
}

//------------------------------delete user section--------------------------------//
public function deleteUser(){
	$this->sql="DELETE FROM tbl_signup WHERE user_id='$this->user_id'";
	$this->res=mysqli_query($this->conxn,$this->sql)or trigger_error($this->err=mysqli_error($this->conxn));
	$this->affRows=mysqli_affected_rows($this->conxn);
	/*echo $this->sql;
	exit;
	echo $this->affRows;*/
if($this->affRows>0){
return true;	
}else{
	return false;
}
	
}
}
?>