<?php
class service extends Connection{
		private $service_id;
		private $service_title;
		private $service_thumb_image;
		private $service_desc;
		private $file_name;
		private $tmp_file_name;
		private $file_type;
		private $final_file_name;
		private $destination;	
		
		public function __construct(){
		parent:: __construct();
		}
		public function setserviceID($bd=''){
			$this->service_id=$bd;
		}
		public function setserviceTitle($be=''){
			$this->service_title=$be;
		}
		public function setserviceThumbImage($te=''){
			$this->service_thumb_image=$te;
		}
		public function setserviceDesc($bc=''){
			$this->service_desc=$bc;
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
		
		//----------------------------Add service ----------------------------------//
		
		public function addservice()
		{
			$this->file_name=$_FILES['service_thumb_image']['name'];
			$this->tmp_file_name=$_FILES['service_thumb_image']['tmp_name'];
			$this->file_type=$_FILES['service_thumb_image']['type'];
			$this->final_file_name=date('y_m_d_i_m_s_').$this->file_name;
			$this->destination=('../uploads/').$this->final_file_name;
			$user_id= $_SESSION['id'];
			if(move_uploaded_file($this->tmp_file_name,$this->destination)){

			$this->sql="INSERT INTO tbl_service (service_id,service_title,service_thumb_image,service_desc) VALUES (NULL,'$this->service_title','$this->final_file_name','$this->service_desc')";
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
		
		
		//------------------view service section ------------------------//
		public function viewservice(){
			if(isset($this->service_id)){
				 $this->sql="SELECT * FROM tbl_service WHERE service_id='$this->service_id'";
				
			}else{
			$this->sql="SELECT * FROM tbl_service ORDER BY service_id DESC";
			
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


//----------------------------delete service section -------------------------------//
	public function deleteservice(){
		if(isset($this->service_id)){
		//get the filename using SELECT query
		$this->sql="SELECT service_thumb_image FROM tbl_service WHERE service_id='$this->service_id'";
		//execute the query
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->row=mysqli_fetch_assoc($this->res);
		
		//check if the file exits
		if(file_exists('../uploads/'.$this->row['service_thumb_image'])){
		@unlink('../uploads/'.$this->row['service_thumb_image']);
		}
		
		$this->sql="DELETE FROM tbl_service WHERE service_id='$this->service_id'";
		//echo $this->service_id;
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
	//----------------------------update service section-----------------------------//
	
	public function updateservice(){
		//$this->service_id=isset($_GET['service_id'])?(int)$_GET['service_id']:'';
		/*echo $this->service_id;
		exit;*/
		$this->file_name=$_FILES['service_thumb_image']['name'];
			$this->tmp_file_name=$_FILES['service_thumb_image']['tmp_name'];
			$this->file_type=$_FILES['service_thumb_image']['type'];
			$this->final_file_name=date('y_m_d_i_m_s_').$this->file_name;
			$this->destination=('../uploads/').$this->final_file_name;
			
			if(move_uploaded_file($this->tmp_file_name,$this->destination)){
		$this->sql="UPDATE tbl_service SET service_title='$this->service_title',service_desc='$this->service_desc',service_thumb_image='$this->final_file_name' WHERE service_id= '$this->service_id'";
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
	