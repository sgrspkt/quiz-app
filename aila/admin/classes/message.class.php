<?php

class Message extends Connection{
		private $visitor_id;
		private $visitor_name;
		private $visitor_email;
		private $visitor_message;
		
		
		public function __construct(){
		parent:: __construct();
		}
		public function setVisitorID($vd=''){
			$this->visitor_id=$vd;
		}
		public function setVisitorName($ve=''){
			$this->visitor_name=$ve;
		}
		public function setvisitorEmail($vl=''){
			$this->visitor_email=$vl;
		}
		public function setVisitorMessage($vm=''){
			$this->visitor_message=$vm;
			}
		
		
		//-------------------------Add Message -------------------------------//
		
		public function addMessage()
		{
			 $this->sql="INSERT INTO tbl_message (visitor_name,visitor_email,visitor_message) VALUES ('$this->visitor_name','$this->visitor_email','$this->visitor_message')";
			$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
			
			if($this->affRows>0){
				
				return true;
			}
			else{
				return false;
			}
			}

		
		//------------------view message section ------------------------//
		public function viewMessage(){
			if(isset($this->visitor_id)){
				$this->sql="SELECT * FROM tbl_message WHERE visitor_id='$this->visitor_id'";
				
			}else{
			$this->sql="SELECT * FROM tbl_message ORDER BY visitor_id DESC";
			
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

//----------------------------delete message section -------------------------------//
	public function deleteMessage(){
		if(isset($this->visitor_id)){
		//get the filename using SELECT query
		$this->sql="DELETE FROM tbl_message WHERE visitor_id='$this->visitor_id'";
		//echo $this->visitor_id;
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
	//----------------------------update message section-----------------------------//
	
	public function updateMessage(){
		
		$this->visitor_id=isset($_GET['visitor_id'])?(int)$_GET['visitor_id']:'';
		//echo "fdasf";
		//echo $this->message_id;
		//exit;*/
		
		$this->sql="UPDATE tbl_message SET visitor_name='$this->visitor_name',visitor_email='$this->visitor_email' WHERE visitor_id= $this->visitor_id ";
		/*echo $this->sql;
		exit;*/
		$this->res=	mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
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
	