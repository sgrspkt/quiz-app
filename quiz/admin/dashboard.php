<?php 
require_once('classes/connection.class.php');
require_once('classes/category.class.php');
require_once('../classes/user.class.php');
require_once('classes/question-answer.class.php');

$catObj = new category();
$catObj->countCategory();
$views = $catObj->countCategory();
/*echo '<pre>';
print_r($catObj);
echo '</pre>';*/

$userObj = new User();
$userObj->countUser();
$userView = $userObj->countUser();


$quesObj = new QuestionAnswer();
$quesObj->countQa();
$quesView = $quesObj->countQa();
?>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner"><h3>
<?php 
if(sizeof($quesView)>0){
  foreach ($quesView as $value) {
    # code...
    echo $value['count'];
  }
}
?>
</h3>

              <p>Questions</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
        <?php 
        if(sizeof($views>0)){
          foreach ($views as $value) {
            # code...
            echo $value['count'];

          }
        }
        ?></h3>

              <sup style="font-size: 20px"></sup></h3>

              <p>Categorie</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3>
             <?php 
        if(sizeof($userView>0)){
          foreach ($userView as $value) {
            # code...
            echo $value['count'];

          }
        }
        ?>
           </h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Highest Score</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
    </section>