<?php

class User extends connection{
	private $user_id;
	private $first_name;
	private $middle_name;
	private $last_name;
	private $username;
	private $password;
	private $ckpassword;
	private $email;
	private $address;
	private $dob;
	private $phone_number;
	private $created_at;
	private $updated_at;

	
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function setUserId($ud=''){
		$this->user_id=$ud;
	}
	
	public function setFirstName($fn=''){
		$this->first_name=$fn;
	}
	public function setMiddleName($mn=''){
		$this->middle_name=$mn;
	}
	public function setLastName($ln=''){
		$this->last_name=$ln;
	}
		public function setUsername($ue=''){
			$this->username=$ue;
			}
	public function setPassword($pd=''){
		$this->password=$pd;
	}
	public function setCkPassword($cpd=''){
		$this->ckpassword=$cpd;
		}
	public function setEmail($em=''){
		$this->email=$em;
	}
	public function setAddress($as=''){
		$this->address=$as;
	}
	public function setDob($dob=''){
		$this->dob=$dob;
	}
	public function setPhoneNumber($pr=''){
		$this->phone_number=$pr;
	}
	public function setMessage($msg=''){
		$this->msg=$msg;
		}
	
	
	//-----------------------------adding the user----------------------------------//
	public function addUser(){




		$this->sql1="INSERT into tbl_user(first_name,middle_name,last_name,username,password,ckpassword,email,address,dob)
					 VALUES('$this->first_name','$this->middle_name','$this->last_name','$this->username','$this->password','$this->ckpassword','$this->email','$this->address','$this->dob')";
					 $this->res1=mysqli_query($this->conxn,$this->sql1) or trigger_error($this->err=mysqli_error($this->conxn));
					$this->affRows1=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));

foreach ($this->phone_number as  $value) {
	$this->sql3="INSERT INTO tbl_phone(user_id,phone_number) VALUES((SELECT user_id FROM tbl_user ORDER BY user_id DESC limit 1),'$value')";
$this->res3=mysqli_query($this->conxn,$this->sql3) or trigger_error($this->err=mysqli_error($this->conxn));
}
					 
					 
					 
					 $this->affRows3=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
					 /*echo $this->affRows;
					 exit;*/
	
					if(($this->affRows1)>0 && ($this->affRows3)>0){
						return true;
					}
					else{
						return false;
					}
	}
	
	//------------------------------view user section------------------------------//
	public function viewUser(){
		//echo $this->user_id; die();
		if(isset($this->user_id)){
			$this->sql="SELECT * FROM tbl_user WHERE user_id='$this->user_id'";
		}
		else{
			 $this->sql="SELECT u.user_id,u.first_name,u.middle_name,u.last_name,u.username,u.email,u.address,
			 u.dob,u.created_at,u.updated_at,p.phone_number FROM tbl_user u join tbl_phone p on u.user_id=p.user_id "; 
			}
			
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->numRows=mysqli_num_rows($this->res);
		$this->row=array();
		if($this->numRows>0){

		while($this->row=mysqli_fetch_assoc($this->res)){
			array_push($this->data,$this->row);
			$_SESSION['user_id'] = $this->row['user_id'];
			
		}
		}
		return $this->data;
}

//--------------------------validate user section----------------------------------//
public function validateUser(){

	if(isset($this->user_id)){
		$this->sql="SELECT * FROM tbl_user WHERE user_id='$this->user_id'";
	}
	else{
	$this->sql="SELECT * FROM tbl_user WHERE username='$this->username' AND password='$this->password' ";
	
	$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
	$this->numRows=mysqli_num_rows($this->res);
	$query = $this->row=array();
	
    if($this->numRows>0){
			while($this->row=mysqli_fetch_assoc($this->res)){
					array_push($this->data,$this->row);
		$_SESSION['user_id'] = $this->row['user_id'];
	}
	

	}
	return $this->data;

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
public function countUser(){
		$this->sql="SELECT count(username) as count FROM `tbl_user`";
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
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