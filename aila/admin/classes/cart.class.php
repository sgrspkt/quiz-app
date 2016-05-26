<?php
include('category.class.php');

class Cart extends Connection{
		//private $user_id;
		private $category_thumb_image;
		private $menu_title;
		private $menu_price;
		private $category_title;
		private $menu_quantity;
		
		
		public function __construct(){
		parent:: __construct();
		}
		public function setUserID($ud=''){
			$this->user_id=$ud;
		}
		
		public function setMenuTitle($be=''){
			$this->menu_title=$be;
		}
		public function setMenuPrice($ce=''){
			$this->menu_price=$ce;
		}
		public function setCategoryTitle($te=''){
			$this->category_title=$te;
			}
			public function setMenuQuantity($my=''){
			$this->menu_quantity=$my;
			}
		public function setCategoryThumbImage($ce=''){
			$this->category_thumb_image($ce);
		}
		
		//----------------------------- Add Category -----------------------------------------//
		
		public function addMenu()
		{

			 $this->sql="INSERT INTO tbl_cart (user_id,menu_title,menu_price,category_title,menu_quantity,category_thumb_image) VALUES ('$this->user_id','$this->menu_title','$this->menu_price','$this->category_title','$this->category_thumb_image')";
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
		public function viewMenu(){
			if(isset($this->menu_title)){
				$this->sql="select * from tbl_menu m left join tbl_category c on m.menu_category=c.category_id where m.menu_title=$this->menu_title";
				
			}else{
			$this->sql="SELECT * FROM tbl_menu ORDER BY menu_id DESC";
			
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


		//------------------view All Category And Menu section ------------------------//
		
		public function viewMenuAndCategory(){
			if(isset($this->menu_id)){
				$this->sql="SELECT * FROM tbl_menu WHERE menu_id='$this->menu_id'";
				
			}else{
			$this->sql="SELECT * FROM tbl_menu ORDER BY menu_id DESC";
			
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


//----------------------------delete menu section -------------------------------//
	public function deleteMenu(){
		if(isset($this->menu_id)){
		//get the filename using SELECT query
		$this->sql="SELECT menu_thumb_image FROM tbl_menu WHERE menu_id='$this->menu_id'";
		//execute the query
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->row=mysqli_fetch_assoc($this->res);
		
		//check if the file exits
		if(file_exists('../uploads/'.$this->row['menu_thumb_image'])){
		@unlink('../uploads/'.$this->row['menu_thumb_image']);
		}
		
		$this->sql="DELETE FROM tbl_menu WHERE menu_id='$this->menu_id'";
		echo $this->menu_id;
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
	
	//----------------------------update menu section-----------------------------//
	
	public function updateMenu(){
		
		$this->menu_id=isset($_GET['menu_id'])?(int)$_GET['menu_id']:'';
		
		/*echo $this->menu_id;
		exit;*/
		
		$this->sql="UPDATE tbl_menu SET menu_title='$this->menu_title',menu_price='$this->menu_price' WHERE menu_id= $this->menu_id ";
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
	