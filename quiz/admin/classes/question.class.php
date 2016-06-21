<?php
class Question extends Connection{
		private $question_id;
		private $category_id;
		private $question_title;
		private $created_at;
		private $updated_at;
		
		
		public function __construct(){
		parent:: __construct();
	}
		
		public function setQuestionId($qd=''){
			$this->question_id=$qd;
		}
		public function setCategoryId($cd=''){
			$this->category_id=$cd;
		}
		public function setQuestionTitle($qe=''){
			$this->question_title=$qe;
		}
		public function setCreatedAt($ct=''){
			$this->created_at=$ct;
		}
		public function setUpdatedAt($ut=''){
			$this->updated_at=$ut;
		}
		
		
		//--------------------------- Add Question-------------------------//
		
		public function addQuestion()
		{
			
			$this->sql="INSERT INTO tbl_question (category_id,question_title,created_at,updated_at) VALUES ('$this->category_id','$this->category_title','$this->created_at','$this->updated_at')";


			$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
			
			if($this->affRows>0){
				
				return true;
			}
			else{
				return false;
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
	