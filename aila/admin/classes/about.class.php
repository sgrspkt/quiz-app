<?php
class About extends Connection{
		private $about_id;
		private $about_thumb_image;
		private $about_desc;
		private $file_name;
		private $tmp_file_name;
		private $file_type;
		private $final_file_name;
		private $destination;
		
		
		public function __construct(){
		parent:: __construct();
		}
		
		public function setaboutID($bd){
			$this->about_id=$bd;
		}
		
		public function setaboutThumbImage($te=''){
			$this->about_thumb_image=$te;
		}
		public function setaboutDesc($bc=''){
			$this->about_desc=$bc;
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
		
		
		
		//////// Add about ///////////////
		
		public function addabout()
		{
			$this->file_name=$_FILES['about_thumb_image']['name'];
			$this->tmp_file_name=$_FILES['about_thumb_image']['tmp_name'];
			$this->file_type=$_FILES['about_thumb_image']['type'];
			$this->final_file_name=date('y_m_d_i_m_s_').$this->file_name;
			$this->destination=('../uploads/').$this->final_file_name;
			$user_id= $_SESSION['id'];
			if(move_uploaded_file($this->tmp_file_name,$this->destination)){

			$this->sql="INSERT INTO tbl_about (about_id,about_thumb_image,about_desc) VALUES (NULL,'$this->final_file_name','$this->about_desc')";
			
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
		
		//------------------view about section ------------------------//
		public function viewabout(){
			if(isset($this->about_id)){
				  $this->sql="SELECT * FROM tbl_about WHERE about_id='$this->about_id'"; 
				
			}else{
			$this->sql="SELECT * FROM tbl_about ORDER BY about_id DESC LIMIT 1";
			
			}
			$this->res=mysqli_query($this->conxn,$this->sql);// or trigger_error($this->err=mysqli_error($this->conxn));
			 $this->numRows=mysqli_num_rows($this->res); //or trigger_error($this->err=mysqli_error($this->conxn));
			$this->data=array();
			
			if($this->numRows>0){
				while($this->row=mysqli_fetch_assoc($this->res)){
					array_push($this->data,$this->row);
				}
				
				}
		return $this->data;
		
}

//----------------------------delete about section -------------------------------//
	public function deleteabout(){
		if(isset($this->about_id)){
		//get the filename using SELECT query
		$this->sql="SELECT about_thumb_image FROM tbl_about WHERE about_id='$this->about_id'";
		//execute the query
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->row=mysqli_fetch_assoc($this->res);
		
		//check if the file exits
		if(file_exists('../uploads/'.$this->row['about_thumb_image'])){
		@unlink('../uploads/'.$this->row['about_thumb_image']);
		}
		
		$this->sql="DELETE FROM tbl_about WHERE about_id='$this->about_id'";
		echo $this->about_id;
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
	
	//----------------------------update about section-----------------------------//
	
	public function updateabout(){
		
		//$this->about_id=isset($_GET['about_id'])?(int)$_GET['about_id']:'';
		//echo "fdasf";
		//echo $this->about_id;
	//	exit;*/
		$this->file_name=$_FILES['about_thumb_image']['name'];
			$this->tmp_file_name=$_FILES['about_thumb_image']['tmp_name'];
			$this->file_type=$_FILES['about_thumb_image']['type'];
			$this->final_file_name=date('y_m_d_i_m_s_').$this->file_name;
			$this->destination=('../uploads/').$this->final_file_name;
			
			if(move_uploaded_file($this->tmp_file_name,$this->destination)){
		$this->sql="UPDATE tbl_about SET about_desc='$this->about_desc',about_thumb_image='$this->final_file_name' WHERE about_id='$this->about_id'";
		
		
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
	