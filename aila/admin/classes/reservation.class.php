<?php
//	session_start();
class Reservation extends connection{
	private $reservation_id;
	private $reservationname;
	private $address;
	private $telephone_home;
	private $telephone_business;
	private $date_of_arrival;
	private $no_of_people;
	private $email;
	private $comments;
	public $msg;
	
	public function __construct(){
		parent::__construct();
	}
	public function setReservationID($ud=''){
		$this->reservation_id=$ud;
	}
	public function setReservationName($re=''){
			$this->reservationname=$re;
	}
	public function setEmail($em=''){
		$this->email=$em;
	}
	public function setAddress($as=''){
		$this->address=$as;
	}
	public function setDateOfArrival($al=''){
		$this->date_of_arrival=$al;
	}
	public function setNoOfPeople($pe=''){
		$this->no_of_people=$pe;
	}
	public function setComments($cs=''){
		$this->comments=$cs;
	}
	public function setTelephoneHome($te=''){
		$this->telephone_home=$te;
	}
	public function setTelephoneBusiness($ts=''){
		$this->telephone_business=$ts;
	}
	public function setMessage($msg=''){
		$this->msg=$msg;
		}
	
	
	//-----------------------adding the reservation------------------------------//
	public function addReservation(){
		$this->sql="INSERT into tbl_reservation(reservation_id,reservationname,date_of_arrival,telephone_home,telephone_business,no_of_people,comments,email,address)
					 VALUES('$this->reservation_id','$this->reservationname','$this->date_of_arrival','$this->telephone_home','$this->telephone_business','$this->no_of_people','$this->comments','$this->email','$this->address')";
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
	
	//------------------------------------view reservation section--------------------------------//
	public function viewReservation(){
		if(isset($this->reservation_id)){
			$this->sql="SELECT * FROM tbl_reservation WHERE reservation_id='$this->reservation_id'";
		}
		else{
		$this->sql="SELECT * FROM tbl_reservation ORDER BY reservationname desc";
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

//------------------------------delete reservation section--------------------------------------//
public function deleteReservation(){
	$this->sql="DELETE FROM tbl_reservation WHERE reservation_id='$this->reservation_id'";
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

//-----------------------------update reservation section------------------------------------//
public function updateReservation(){
	
	$this->sql="UPDATE reservation SET reservationname='$this->reservationname',password='$this->password',
	email='$this->email' WHERE reservation_id='$this->reservation_id'";
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