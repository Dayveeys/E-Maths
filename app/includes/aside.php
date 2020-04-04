<?php if ($admin_level == 'super') {
       echo '
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            
            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
                       
            <li><a href="reg_admin.php"><i class="fa fa-plus"></i> Register Admin/Tutor</a></li>
            <li><a href="admin.php"><i class="fa fa-user"></i> Administrators</a></li>
            <li><a href="staff.php"><i class="glyphicon glyphicon-user"></i> Tutor Details</a></li>
            <li><a href="students.php"><i class="fa fa-users"></i> Student Details</a></li>
              
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Manage Courseware</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="jss1.php"><i class="fa fa-files-o"></i> JSS1</a></li>
                <li><a href="JSS2.php"><i class="fa fa-files-o"></i> JSS2</a></li>
                <li><a href="JSS3.php"><i class="fa fa-files-o"></i> JSS3</a></li>
                <li><a href="SSS1.php"><i class="fa fa-files-o"></i> SSS1</a></li>
                <li><a href="SSS2.php"><i class="fa fa-files-o"></i> SSS2</a></li>
                <li><a href="SSS3.php"><i class="fa fa-files-o"></i> SSS3</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-video-camera"></i> <span>Manage Videos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="vjss1.php"><i class="fa fa-toggle-right"></i> JSS1</a></li>
                <li><a href="VJSS2.php"><i class="fa fa-toggle-right"></i> JSS2</a></li>
                <li><a href="VJSS3.php"><i class="fa fa-toggle-right"></i> JSS3</a></li>
                <li><a href="VSSS1.php"><i class="fa fa-toggle-right"></i> SSS1</a></li>
                <li><a href="VSSS2.php"><i class="fa fa-toggle-right"></i> SSS2</a></li>
                <li><a href="VSSS3.php"><i class="fa fa-toggle-right"></i> SSS3</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dot-circle-o"></i> <span>Tutor Guide</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="images/National Term Schedule of Topics for Mathematics - Grade 7..pdf"><i class="fa fa-file-text-o"></i> JSS1</a></li>
                <li><a href="JSS2.php"><i class="fa fa-file-text-o"></i> JSS2</a></li>
                <li><a href="JSS3.php"><i class="fa fa-file-text-o"></i> JSS3</a></li>
                <li><a href="SSS1.php"><i class="fa fa-file-text-o"></i> SSS1</a></li>
                <li><a href="SSS2.php"><i class="fa fa-file-text-o"></i> SSS2</a></li>
                <li><a href="SSS3.php"><i class="fa fa-file-text-o"></i> SSS3</a></li>
              </ul>
            </li>

            <li>
              <a href="quiz/index.php">
                <i class="fa fa-question-circle"></i> <span>Quiz and Skill Test</span>
              </a>
            </li>

            <li>
              <a href="feedback.php">
                <i class="fa fa-envelope"></i> <span>Users Feedback</span>
              </a>
            </li>


            <li>
              <a href="logout.php">
                <i class="glyphicon glyphicon-log-out"></i> <span>Logout</span>
              </a>
            </li>
          </ul>
        </section>
</aside>';
}else{
  echo '
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            
            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
                       
            <li><a href="students.php"><i class="fa fa-users"></i> Student Details</a></li>
              
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Manage Courseware</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="jss1.php"><i class="fa fa-files-o"></i> JSS1</a></li>
                <li><a href="JSS2.php"><i class="fa fa-files-o"></i> JSS2</a></li>
                <li><a href="JSS3.php"><i class="fa fa-files-o"></i> JSS3</a></li>
                <li><a href="SSS1.php"><i class="fa fa-files-o"></i> SSS1</a></li>
                <li><a href="SSS2.php"><i class="fa fa-files-o"></i> SSS2</a></li>
                <li><a href="SSS3.php"><i class="fa fa-files-o"></i> SSS3</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-video-camera"></i> <span>Manage Videos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="vjss1.php"><i class="fa fa-toggle-right"></i> JSS1</a></li>
                <li><a href="VJSS2.php"><i class="fa fa-toggle-right"></i> JSS2</a></li>
                <li><a href="VJSS3.php"><i class="fa fa-toggle-right"></i> JSS3</a></li>
                <li><a href="VSSS1.php"><i class="fa fa-toggle-right"></i> SSS1</a></li>
                <li><a href="VSSS2.php"><i class="fa fa-toggle-right"></i> SSS2</a></li>
                <li><a href="VSSS3.php"><i class="fa fa-toggle-right"></i> SSS3</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dot-circle-o"></i> <span>Tutor Guide</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="jss1.php"><i class="fa fa-file-text-o"></i> JSS1</a></li>
                <li><a href="JSS2.php"><i class="fa fa-file-text-o"></i> JSS2</a></li>
                <li><a href="JSS3.php"><i class="fa fa-file-text-o"></i> JSS3</a></li>
                <li><a href="SSS1.php"><i class="fa fa-file-text-o"></i> SSS1</a></li>
                <li><a href="SSS2.php"><i class="fa fa-file-text-o"></i> SSS2</a></li>
                <li><a href="SSS3.php"><i class="fa fa-file-text-o"></i> SSS3</a></li>
              </ul>
            </li>

            <li>
              <a href="quiz/index.php">
                <i class="fa fa-question-circle"></i> <span>Quiz and Skill Test</span>
              </a>
            </li>


            <li>
              <a href="logout.php">
                <i class="glyphicon glyphicon-log-out"></i> <span>Logout</span>
              </a>
            </li>
          </ul>
        </section>
</aside>';
}
?>