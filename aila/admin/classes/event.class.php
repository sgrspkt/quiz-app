<?php

class Event extends connection{
	private $event_id;
	private $event_title;
	private $event_desc;
	private $event_date;
	
	
	public function __construct(){
		parent::__construct();
	}
	public function setEventID($eid=''){
		$this->event_id=$eid;
	}
	public function setEventTitle($ee=''){
		$this->event_title=$ee;
	}
	public function setEventDesc($ec=''){
		$this->event_desc=$ec;
	}
		public function setEventDate($ed=''){
			$this->event_date=$ed;
			}
	
	//-------------------------------adding the event-------------------------------//
	public function addEvent(){
		$this->sql="INSERT into tbl_events(event_id,event_title,event_desc,event_date)
					 VALUES('$this->event_id','$this->event_title','$this->event_desc','$this->event_date')";
					 /*echo $this->sql;
					 exit;*/
					 $this->res=mysqli_query($this->conxn,$this->sql);// or trigger_error($this->err=mysqli_error($this->conxn));
					 $this->affRows=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));
					 /*echo $this->affRows;
					 exit;*/
	
					if($this->affRows>0){
						return true;
					}
					else{
						return false;
					}
	}
	
	//-------------------------------view event section------------------------------//
	public function viewevent(){
		if(isset($this->event_id)){
			$this->sql="SELECT * FROM tbl_events WHERE event_id='$this->event_id' LIMIT 5";
		}
		else{
		 $this->sql="SELECT * FROM tbl_events ORDER BY event_id desc";
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

//-----------------------------delete event section-----------------------------------//
public function deleteevent(){
	$this->sql="DELETE FROM tbl_events WHERE event_id='$this->event_id'";
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

//----------------------------update event section-----------------------------------//
public function updateevent(){
	
	$this->sql="UPDATE tbl_events SET event_title='$this->event_title',event_desc='$this->event_desc',event_date='$this->event_date' WHERE event_id='$this->event_id'";
	
	$this->res=mysqli_query($this->conxn,$this->sql);// or trigger_error($this->err=mysqli_error($this->conxn));
	$this->affRows=mysqli_affected_rows($this->conxn);//or trigger_error($this->err=mysqli_error($this->conxn));
	/*echo $this->sql;
	exit;
	echo $this->affRows;
	exit;*/
	if($this->affRows>0){
return true;	
}else{
	return $this -> event_title;
}				
}
}
?>