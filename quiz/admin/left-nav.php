<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
<?php if($_SESSION['username'] != null ){
                echo "<p>". $_SESSION['username'].'</p>';
                }?>
          
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <!--question-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Question</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.php?page=question&action=add"><i class="fa fa-circle-o"></i> Add Question</a></li>
            <li><a href="index.php?page=question&action=view"><i class="fa fa-circle-o"></i> View Question</a></li>
          </ul>
        </li>

        <!--category-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Category</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.php?page=category&action=add"><i class="fa fa-circle-o"></i> Add Category</a></li>
            <li><a href="index.php?page=category&action=view"><i class="fa fa-circle-o"></i> View Category</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?page=user&action=view"><i class="fa fa-circle-o"></i> View User</a></li>
          </ul>
        </li>

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
