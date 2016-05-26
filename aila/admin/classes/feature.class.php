<?php

class feature extends connection{
	private $feature_id;
	private $feature_title;
	private $feature_desc;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function setfeatureID($fid=''){
		$this->feature_id=$fid;
	}
	public function setfeatureTitle($fe=''){
		$this->feature_title=$fe;
	}
	public function setfeatureDesc($fc=''){
		$this->feature_desc=$fc;
	}
		
	//--------------------------------adding the feature-------------------------------//
	public function addfeature(){
		$this->sql="INSERT into tbl_features(feature_id,feature_title,feature_desc)
					 VALUES('$this->feature_id','$this->feature_title','$this->feature_desc')";
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
	
	//--------------------------------------view feature section--------------------------------//
	public function viewfeature(){
		if(isset($this->feature_id)){
			$this->sql="SELECT * FROM tbl_features WHERE feature_id='$this->feature_id'";
		}
		else{
		 $this->sql="SELECT * FROM tbl_features ORDER BY feature_id desc LIMIT 3";
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


//------------------------------delete feature section----------------------------//
public function deletefeature(){
	$this->sql="DELETE FROM tbl_features WHERE feature_id='$this->feature_id'";
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

//--------------------------------update feature section---------------------------//
public function updatefeature(){
	
	$this->sql="UPDATE tbl_features SET feature_title='$this->feature_title',feature_desc='$this->feature_desc'
	WHERE feature_id='$this->feature_id'";
	$this->res=mysqli_query($this->conxn,$this->sql);// or trigger_error($this->err=mysqli_error($this->conxn));
	$this->affRows=mysqli_affected_rows($this->conxn);//or trigger_error($this->err=mysqli_error($this->conxn));
	/*echo $this->sql;
	exit;
	echo $this->affRows;
	exit;*/
	if($this->affRows>0){
return true;	
}else{
	return false;
}				
}
}
?>