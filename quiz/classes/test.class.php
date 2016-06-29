<?php

class Test extends connection{
	private $test_id;
	private $user_id;
	private $category_id;
	private $correct_ans;
	private $incorrect_ans;
	private $score;
	private $bestscore;
	private $question_id;
	private $answer;
	private $game_id;
	
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function setTestId($td=''){
		$this->test_id=$td;
	}
	public function setUserId($ud=''){
		$this->user_id=$ud;
	}
	public function setGameId($gd=''){
		$this->game_id=$gd;
	}
	public function setCategoryId($cd=''){
		$this->category_id=$cd;
	}
	public function setCategoryName($cn=''){
		$this->category_name=$cn;
	}
	public function setUserAnswerId($uad=''){
		$this->user_answer_id=$uad;
	}
	public function setCorrectAns($ca=''){
		$this->correct_answer=$ca;
	}
	public function setScore($se=''){
		$this->score=$se;
	}
	public function setUserAnswer($ur=''){
		$this->user_answer=$ur;
	}
	
	public function setBestScore($be=''){
		$this->best_score=$be;
	}
	
	public function setQuestionId($qd=''){
		$this->question_id=$qd;
	}
	
	//-----------------------------adding the user----------------------------------//
	public function addTest(){
		$this->sql = "SELECT category_id from tbl_category where category_name='$this->category_name'";
$this->sql = "INSERT INTO  tbl_user_answer (question_id,answer,user_id,category_id) VALUES('$this->question_id','$this->user_answer','$this->user_id',($this->sql))";
					 $this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
					$this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
					 
					if(($this->affRows)>0){
						return true;
					}
					else{
						return false;
					}
	}
	//--------------------------add score section----------------------------------//
public function addScore(){


	$this->sql_correct_answer = "SELECT count(*)as correct_answer FROM tbl_user_answer ua join tbl_correct_answer ca
						 on ua.question_id = ca.question_id where ua.answer = ca.correct_answer ";
	$this->sql_incorrect_answer = "SELECT count(*)as incorrect_answer FROM tbl_user_answer ua join tbl_correct_answer ca
					 on ua.question_id = ca.question_id where ua.answer <> ca.correct_answer ";

$this->sql = "INSERT INTO  tbl_test (test_id,user_id,category_id,correct_ans,incorrect_ans,score,bestscore)
			 VALUES('$this->test_id','$this->user_id','$this->category_id',($this->sql_correct_answer),($this->sql_incorrect_answer),($this->sql_correct_answer),($this->sql_correct_answer))";


 $this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
					$this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
					 
					if(($this->affRows)>0){
						return true;
					}
					else{
						return false;
					}

}
	
	//------------------------------view user section------------------------------//
	public function viewUser(){
		//echo $this->user_id; die();
		if(isset($this->user_id)){
			$this->sql="SELECT * FROM tbl_user WHERE user_id='$this->user_id'";
		}
		else{
			 $this->sql="SELECT u.user_id,u.first_name,u.middle_name,u.last_name,u.username,u.email,u.address,
			 u.dob,u.created_at,u.updated_at,p.phone_number FROM tbl_user u join tbl_phone p on u.user_id=p.user_id "; 
			}
			
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->numRows=mysqli_num_rows($this->res);
		$this->row=array();
		if($this->numRows>0){

		while($this->row=mysqli_fetch_assoc($this->res)){
			array_push($this->data,$this->row);
			$_SESSION['user_id'] = $this->row['user_id'];
			
		}
		}
		return $this->data;
}



//------------------------------delete user section--------------------------------//
public function deleteUser(){
	$this->sql="DELETE FROM tbl_signup WHERE user_id='$this->user_id'";
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
public function countUser(){
		$this->sql="SELECT count(username) as count FROM `tbl_user`";
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
}
?>