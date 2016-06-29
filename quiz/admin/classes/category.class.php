<?php
require_once('connection.class.php');
class Category extends Connection{
		private $category_id;
		private $category_name;
		private $created_at;
		private $updated_at;
		
		
		public function __construct(){
		parent:: __construct();
	}
		
		public function setCategoryId($cd=''){
			$this->category_id=$cd;
		}
		
		public function setcategoryName($ce=''){
			$this->category_name=$ce;
		}
		public function setCreatedAt($ct=''){
			$this->created_at=$ct;
		}
		public function setUpdatedAt($ut=''){
			$this->updated_at=$ut;
		}
		
		
		//--------------------------- Add category-------------------------//
		
		public function addcategory()
		{
			
			 $this->sql="INSERT INTO tbl_category (category_id,category_name,created_at,updated_at) VALUES ('$this->category_id','$this->category_name','$this->created_at','$this->updated_at')";


			$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
			
			if($this->affRows>0){
				
				return true;
			}
			else{
				return false;
			}
			

		}
		
		//------------------view category section ------------------------//
		public function viewCategory(){
			if(isset($this->category_id)){
				$this->sql="SELECT * FROM tbl_category WHERE category_id='$this->category_id'";
				
			}else{
			$this->sql="SELECT * FROM tbl_category ORDER BY category_id DESC";
			
			}
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

//----------------------------delete category section -------------------------------//
	public function deleteCategory(){
		
		$this->sql="DELETE FROM tbl_category WHERE category_id='$this->category_id'";
		//echo $this->category_id;
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->affRows=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));
		if($this->affRows>0){
				return true;
				}
				else{
			return false;
		}
	
	}
	
	
	//----------------------------update category section-----------------------------//
	public function updateCategory(){
		
		//var_dump($this->category_id); die();
		$this->category_id = (int)$this->category_id; 
		
		$this->sql="UPDATE tbl_category SET category_name='$this->category_name',created_at='$this->created_at',updated_at='$this->updated_at' WHERE category_id= $this->category_id ";
		/*echo $this->sql;
		exit;*/
		$this->res=	mysqli_query($this->conxn,$this->sql);// or trigger_error($this->err=mysqli_error($this->conxn));
		$this->affRows=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));
		/*echo $this->affRows;
		exit;*/
		if($this->affRows>0){
			return true;
		}else{
			return false;
		}
	
	}
	public function countCategory(){
		$this->sql="SELECT count(category_name) as count FROM `tbl_category`";
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
	public function searchAjax(){
		
		
				$this->sql="SELECT category_name FROM tbl_category where category_name like '%".$_POST['query']."%'";

		$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			$output = '<ul class="list-unstyled">';
	$this->numRows = mysqli_num_rows($this->res);
	if($this->numRows>0){
		while($this->row = mysqli_fetch_array($this->res)){
			$output.='<li>'.$this->row['category_name'].'</li>';
		}
	}else{
		$output.='</li>not available</li>';
	}
	$output.='</ul>';
	return  $output;
}
/*public function searchCategoryId(){
	$this->sql="SELECT q.question_title,a.answer FROM tbl_question q JOIN tbl_answer a
								ON q.question_id = a.question_id 
								JOIN tbl_category c
								ON q.category_id = c.category_id
								WHERE q.category_name = '".$_POST['category']."'";
	//$this->sql="SELECT category_id FROM tbl_category where category_name like '%".$_POST['category']."%'";
	$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			
	$this->numRows = mysqli_num_rows($this->res);
	if($this->numRows>0){
		while($this->row = mysqli_fetch_array($this->res)){
			$output=$this->row['category_id'];
		}
	
	return  $output;
}
}*/
}