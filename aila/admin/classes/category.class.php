<?php
class Category extends Connection{
		private $category_id;
		private $category_title;
		private $category_thumb_image;
		private $file_name;
		private $tmp_file_name;
		private $file_type;
		private $final_file_name;
		private $destination;
		
		
		public function __construct(){
		parent:: __construct();
	}
		
		public function setCategoryID($cd=''){
			$this->category_id=$cd;
		}
		public function setCategoryTitle($be=''){
			$this->category_title=$be;
		}
		public function setCategoryThumbImage($ie=''){
			$this->category_thumb_image=$ie;
		}
		public function setFileName($fe=''){
			$this->file_name=$fe;
		}
		public function setTmpFileName($te=''){
			$this->tmp_file_name=$te;
		}
		public function setFileType($ft=''){
			$this->file_type=$ft;
		}
		public function setFinalFileName($ffn=''){
			$this->final_file_name=$ffn;
		}
		public function setDestination($dn=''){
			$this->destination=$dn;
		}
		
		//--------------------------- Add Category-------------------------//
		
		public function addCategory()
		{
			$this->file_name=$_FILES['category_thumb_image']['name'];
			$this->tmp_file_name=$_FILES['category_thumb_image']['tmp_name'];
			$this->file_type=$_FILES['category_thumb_image']['type'];
			$this->final_file_name=date('y_m_d_i_m_s_').$this->file_name;
			$this->destination=('../uploads/').$this->final_file_name;
			//$user_id= $_SESSION['id'];
			if(move_uploaded_file($this->tmp_file_name,$this->destination)){

			$this->sql="INSERT INTO tbl_category (category_title,category_thumb_image) VALUES ('$this->category_title','$this->final_file_name')";
			$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
			
			if($this->affRows>0){
				
				return true;
			}
			else{
				return false;
			}
			}

		}
		
		//------------------view Category section ------------------------//
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
		if(isset($this->category_id)){
		//get the filename using SELECT query
		$this->sql="SELECT category_thumb_image FROM tbl_category WHERE category_id='$this->category_id'";
		//execute the query
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->row=mysqli_fetch_assoc($this->res);
		
		//check if the file exits
		if(file_exists('../../uploads/'.$this->row['category_thumb_image'])){
		@unlink('../../uploads/'.$this->row['category_thumb_image']);
		}
		
		$this->sql="DELETE FROM tbl_category WHERE category_id='$this->category_id'";
		echo $this->category_id;
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->affRows=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));
		if($this->affRows>0){
				return true;
				}
				else{
			return false;
		}
	
	}
	}
	
	//----------------------------update category section-----------------------------//
	public function updateCategory(){
		
		/*echo $this->category_id=isset($_GET['$this->category_id'])?(int)$_GET['$this->category_id']:''; exit;*/
		
		//echo $this->category_id;
		//exit;
		$this->file_name=$_FILES['category_thumb_image']['name'];
			$this->tmp_file_name=$_FILES['category_thumb_image']['tmp_name'];
			$this->file_type=$_FILES['category_thumb_image']['type'];
			$this->final_file_name=date('y_m_d_i_m_s_').$this->file_name;
			$this->destination=('../uploads/').$this->final_file_name;
			
			
			if(move_uploaded_file($this->tmp_file_name,$this->destination)){
		$this->sql="UPDATE tbl_category SET category_title='$this->category_title',category_thumb_image='$this->final_file_name' WHERE category_id= $this->category_id ";
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
	}
	}
	