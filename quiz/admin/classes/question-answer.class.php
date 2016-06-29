<?php
class QuestionAnswer extends Connection{
		private $question_id;
		private $category_id;
		private $answer_id;
		private $correct_answer_id;
		private $question_title;
		private $correct_answer;
		private $answer;
		private $category;
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
		public function setAnswerId($ad=''){
			$this->answer_id=$ad;
		}
		public function setCorrectAnswerId($cad=''){
			$this->correct_answer_id=$cad;
		}
		public function setQuestionTitle($qe=''){
			$this->question_title=$qe;
		}
		public function setCorrectAnswer($cr=''){
			$this->correct_answer=$cr;
		}
		public function setCategory($cy=''){
			$this->category=$cy;
		}
		public function setAnswer($ar=''){
			$this->answer=$ar;
		}
		public function setCreatedAt($ct=''){
			$this->created_at=$ct;
		}
		public function setUpdatedAt($ut=''){
			$this->created_at=$ut;
		}
		

		//--------------------------- Add Question-------------------------//
		
		public function addQa()
		{
			
			$this->sql1 = "SELECT category_id from tbl_category where category_name='$this->category'";
			$this->res1=mysqli_query($this->conxn,$this->sql1) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->numRows1=mysqli_num_rows($this->res1);
			
			$this->sql2="INSERT INTO tbl_question (category_id,question_title,created_at,updated_at)
			 VALUES (($this->sql1),'$this->question_title','$this->created_at','$this->updated_at')";
			 
			$this->res2=mysqli_query($this->conxn,$this->sql2);// or trigger_error($this->err=mysqli_error($this->conxn));
			$this->affRows2=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));

			$this->sql3="SELECT question_id FROM tbl_question ORDER BY question_id DESC LIMIT 1";
			$this->res3=mysqli_query($this->conxn,$this->sql3) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->numRows3=mysqli_num_rows($this->res3);

			$this->sql4="INSERT INTO tbl_correct_answer (question_id,correct_answer,created_at,updated_at)
			VALUES(($this->sql3),'$this->correct_answer','$this->created_at','$this->created_at')";
			$this->res4=mysqli_query($this->conxn,$this->sql4) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->affRows4=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));

			$this->sql5="SELECT correct_answer_id FROM tbl_correct_answer ORDER BY correct_answer_id DESC LIMIT 1";
			$this->res5=mysqli_query($this->conxn,$this->sql5) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->numRows5=mysqli_num_rows($this->res5);

		foreach ($this->answer as  $answer) {
			$this->sql6="INSERT INTO tbl_answer (question_id,correct_answer_id,answer,created_at,updated_at)
			 VALUES(($this->sql3),($this->sql5),'$answer','$this->created_at','$this->created_at')";
			$this->res6=mysqli_query($this->conxn,$this->sql6) or trigger_error($this->err=mysqli_error($this->conxn));
		}
			$this->affRows6=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));

			if(($this->affRows2)>0 || ($this->affRows4)>0 || ($this->affRows6)>0){
				
				return true;
			}
			else{
				return false;
			}
			

		}
		
		//------------------view Category section ------------------------//
		public function viewQa(){
			if(isset($this->question_id)){
				//echo $this->question_id; die();
				$this->sql="SELECT * FROM tbl_question WHERE question_id='$this->question_id'";
				
			}else{
				$this->sql = "SELECT q.question_title,a.answer FROM tbl_question q JOIN tbl_answer a
								ON q.question_id = a.question_id 
								JOIN tbl_category c
								ON q.category_id = c.category_id
								WHERE c.category_name = '".$_POST['category']."'";
							

				/* $this->sql = "SELECT q.question_id, a.answer, q.question_title, c.category_name, q.created_at, q.updated_at
							 FROM (`tbl_correct_answer` ca
							  left join `tbl_answer`a
							  on ca.correct_answer_id=a.correct_answer_id
							  left join `tbl_question` q 
							  on q.question_id=a.question_id 
							  left join `tbl_category` c 
							  on c.category_id=q.category_id)";*/
			
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
public function viewCorrectAnswer(){
			if(isset($this->question_id)){
				//echo "$this->question_id"; die();
				$this->sql="SELECT correct_answer FROM tbl_correct_answer WHERE question_id='$this->question_id'";
				
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
	public function deleteQuestion(){

		if(isset($this->question_id)){
		$this->sql2="DELETE FROM tbl_correct_answer WHERE question_id='$this->question_id'"; 
		$this->res2=mysqli_query($this->conxn,$this->sql2) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->affRows2=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));

		$this->sql1="DELETE FROM tbl_answer WHERE question_id='$this->question_id'"; 
		$this->res1=mysqli_query($this->conxn,$this->sql1) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->affRows1=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));

		$this->sql="DELETE FROM tbl_question WHERE question_id='$this->question_id'"; 
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->affRows=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));

		

		

		if(($this->affRows)>0 && ($this->affRows1)>0 && ($this->affRows2)>0) {
				return true;
				}
				else{
			return false;
		}
	
	}
	}
	
	//----------------------------update category section-----------------------------//
	public function updateQuestionAnswer(){
		//echo $this->correct_answer; die();
		//echo $this->question_id=isset($_GET['$this->question_id'])?(int)$_GET['$this->question_id']:''; die();
		
 $this->sql1 = "SELECT category_id from tbl_category where category_name='$this->category'";
			$this->res1=mysqli_query($this->conxn,$this->sql1) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->numRows1=mysqli_num_rows($this->res1);
			
		$this->sql2="UPDATE tbl_question set category_id=($this->sql1),question_title='$this->question_title',created_at='$this->created_at',updated_at='$this->updated_at'
			 where question_id='$this->question_id'";  
			 
			$this->res2=mysqli_query($this->conxn,$this->sql2) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->affRows2=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));

			/*$this->sql3="SELECT question_id FROM tbl_question ORDER BY question_id DESC LIMIT 1";
			$this->res3=mysqli_query($this->conxn,$this->sql3) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->numRows3=mysqli_num_rows($this->res3);*/

			 $this->sql4="UPDATE tbl_correct_answer set
			 correct_answer='$this->correct_answer',
			 created_at='$this->created_at',
			 updated_at='$this->updated_at' WHERE question_id ='$this->question_id'" ;

			/*$this->sql4="INSERT INTO tbl_correct_answer (question_id,correct_answer,created_at,updated_at)
			VALUES(($this->sql3),'$this->correct_answer','$this->created_at','$this->created_at')";*/
			$this->res4=mysqli_query($this->conxn,$this->sql4) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->affRows4=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));

			$this->sql5="SELECT correct_answer_id FROM tbl_correct_answer ORDER BY correct_answer_id DESC LIMIT 1"; 
			$this->res5=mysqli_query($this->conxn,$this->sql5);// or trigger_error($this->err=mysqli_error($this->conxn));
			$this->numRows5=mysqli_num_rows($this->res5);

			foreach ($this->answer as  $answer) {

			$this->sql6="UPDATE tbl_answer set correct_answer_id=($this->sql5),answer='$answer',created_at='$this->created_at',updated_at='$this->updated_at'
			 WHERE question_id ='$this->question_id'";
			/*$this->sql6="INSERT INTO tbl_answer (question_id,correct_answer_id,answer,created_at,updated_at)
			 VALUES(($this->sql3),($this->sql5),'$answer','$this->created_at','$this->created_at')";*/
			$this->res6=mysqli_query($this->conxn,$this->sql6) or trigger_error($this->err=mysqli_error($this->conxn));
		}
			$this->affRows6=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));

			if(($this->affRows2)>0 && ($this->affRows4)>0 && ($this->affRows6)>0){
				
				return true;
			}
			else{
				return false;
			}

	}
	

public function countQa(){
			if(isset($this->category_id)){
				$this->sql="SELECT * FROM tbl_question WHERE question_id='$this->question_id'";
				
			}else{
				$this->sql = "SELECT count(question_title) as count from tbl_question";
			
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

	}
	