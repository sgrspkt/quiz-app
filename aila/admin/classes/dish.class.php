<?php
class Dish extends connection{
	private $dish_id;
	private $dish_title;
	private $dish_price;
	
	
	
	public function __construct(){
		parent::__construct();	
	}
	public function setdishID($fid=''){
		$this->dish_id=$fid;
	}
	public function setdishTitle($fe=''){
		$this->dish_title=$fe;
	}
	public function setdishprice($fc=''){
		$this->dish_price=$fc;
	}
		
	//---------------------adding the dish-------------------------//
	public function adddish(){
		$this->sql="INSERT into tbl_dish(dish_id,dish_title,dish_price)
					 VALUES('$this->dish_id','$this->dish_title','$this->dish_price')";
					 // echo $this->sql;
					 // exit;
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
	
	//-------------------------------view dish section-------------------------------//
	public function viewdish(){
		if(isset($this->dish_id)){
			$this->sql="SELECT * FROM tbl_dish WHERE dish_id='$this->dish_id' LIMIT 5";
		}
		else{
		 $this->sql="SELECT * FROM tbl_dish ORDER BY dish_id desc";
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

//----------------------------------delete dish section------------------------------------//
public function deletedish(){
	$this->sql="DELETE FROM tbl_dish WHERE dish_id='$this->dish_id'";
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

//------------------------------update dish section-------------------------------//
public function updatedish(){
	
	$this->sql="UPDATE tbl_dish SET dish_title='$this->dish_title',dish_price='$this->dish_price'
	WHERE dish_id='$this->dish_id'";
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