<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url(); ?>/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url(); ?>/assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url(); ?>/assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url(); ?>/assets/admin/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url(); ?>/assets/admin/dist/css/AdminLTE.min.css">
   <link rel="stylesheet" href="<?=base_url(); ?>/assets/admin/data-table/datatables.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url(); ?>/assets/admin/dist/css/skins/_all-skins.min.css">
  <script src="<?=base_url(); ?>/assets/admin/bower_components/jquery/dist/jquery.min.js"></script> 
<script src="<?=base_url(); ?>/assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url(); ?>/assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="<?=base_url(); ?>/assets/admin/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="<?=base_url(); ?>/assets/admin/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="<?=base_url(); ?>/assets/admin/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="<?=base_url(); ?>/assets/admin/#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="<?=base_url(); ?>/assets/admin/#" class="dropdown-toggle" data-toggle="dropdown">
                          </a>
            <ul class="dropdown-menu">
              
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
                  <!-- end message -->
                  
                  
                  
                 
                </ul>
              </li>
              
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="<?=base_url(); ?>/assets/admin/#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url(); ?>/assets/admin/dist/img/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url(); ?>/assets/admin/dist/img/avatar.png" class="img-circle" alt="User Image">

                <p>
                  Admin
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <?php echo anchor('backend/auth/logout', 'Sign out',['class'=>'btn btn-default btn-flat']); ?> 
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?=base_url(); ?>/assets/admin/#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url(); ?>/assets/admin/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="<?=base_url(); ?>/assets/admin/#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">
          <a href="<?=base_url(); ?>/assets/admin/#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($this->uri->segment(3)=="page") {echo "active"; } else  {echo "";}?>"><a href="<?= site_url( 'backend/auth/page'); ?>"><i class="fa fa-circle-o"></i> Users</a></li>
            <li class="<?php if ($this->uri->segment(2)=="payments") {echo "active"; } else  {echo "";}?>"><a href="<?= site_url( 'backend/payments'); ?>"><i class="fa fa-circle-o"></i> Payments</a></li>
            <li class="<?php if ($this->uri->segment(3)=="teachers") {echo "active"; } else  {echo "";}?>"><a href="<?= site_url( 'backend/auth/teachers'); ?>"><i class="fa fa-circle-o"></i> Teachers</a></li>
            <li class="<?php if ($this->uri->segment(3)=="center") {echo "active"; } else  {echo "";}?>"><a href="<?= site_url( 'backend/auth/center'); ?>"><i class="fa fa-circle-o"></i> Center</a></li>
            <li class="<?php if ($this->uri->segment(3)=="students") {echo "active"; } else  {echo "";}?>"><a href="<?= site_url( 'backend/auth/students'); ?>"><i class="fa fa-circle-o"></i> Student</a></li>
            <li class="<?php if ($this->uri->segment(3)=="price") {echo "active"; } else  {echo "";}?>"><a href="<?= site_url( 'backend/price/index'); ?>"><i class="fa fa-circle-o"></i> Price</a></li>
            <li class="<?php if ($this->uri->segment(3)=="index") {echo "active"; } else  {echo "";}?>"><a href="<?= site_url( 'backend/Sub_list/index'); ?>"><i class="fa fa-circle-o"></i> Subscription</a></li>
            <li class="<?php if ($this->uri->segment(3)=="activate") {echo "active"; } else  {echo "";}?>"><a href="<?= site_url( 'backend/price/activate'); ?>"><i class="fa fa-circle-o"></i> Ready to active Users</a></li>
            <li class="<?php if ($this->uri->segment(3)=="info") {echo "active"; } else  {echo "";}?>"><a href="<?= site_url( 'backend/Del_student/info'); ?>"><i class="fa fa-circle-o"></i> Deleted Student</a></li>
            <li class="<?php if ($this->uri->segment(3)=="info1") {echo "active"; } else  {echo "";}?>"><a href="<?= site_url( 'backend/Cancel_class/info1'); ?>"><i class="fa fa-circle-o"></i> Cancel Class By Teacher</a></li>
             <li class="<?php if ($this->uri->segment(3)=="info2") {echo "active"; } else  {echo "";}?>"><a href="<?= site_url( 'backend/Cancel_class/info2'); ?>"><i class="fa fa-circle-o"></i> Booked Class By Student</a></li>
             <li class="<?php if ($this->uri->segment(3)=="info3") {echo "active"; } else  {echo "";}?>"><a href="<?= site_url( 'backend/Cancel_class/info3'); ?>"><i class="fa fa-circle-o"></i> Teacher Booked By Institute</a></li>


            <!-- <li class="active"><a href=""><i class="fa fa-circle-o"></i> </a></li> -->
          </ul>
        </li>
        
        
        
        <script>
    ;(function($){
    
      
      $.fn.scrollPosReaload = function(){
          if (localStorage) {
              var posReader = localStorage["posStorage"];
              if (posReader) {
                  $(window).scrollTop(posReader);
                  localStorage.removeItem("posStorage");
              }
              $(this).click(function(e) {
                  localStorage["posStorage"] = $(window).scrollTop();
              });

              return true;
          }

          return false;
      }
      
      /* ================================================== */

      $(document).ready(function() {
          // Feel free to set it for any element who trigger the reload
          $('#tabbb1').scrollPosReaload();
           $('#tabbb2').scrollPosReaload();
            $('#tabbb3').scrollPosReaload();
             $('#tabbb4').scrollPosReaload();
              $('#tabbb5').scrollPosReaload();
               $('#tabbb6').scrollPosReaload();
                $('#tabbb7').scrollPosReaload();

          
      });
    
  }(jQuery)); 



   </script>
        
        
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small></small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="<?=base_url(); ?>/assets/admin/#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <?=$contents; ?>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong><p>All Rights Reserved © Demo |<a href="<?= site_url('home/policys')?>">Privacy Policy </a>   <a href="<?= site_url('home/termss')?>" >Terms and Conditions</a></p>
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
  

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url(); ?>/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>



<!-- FastClick -->
<script src="<?=base_url(); ?>/assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url(); ?>/assets/admin/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url(); ?>/assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?=base_url(); ?>/assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url(); ?>/assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url(); ?>/assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url(); ?>/assets/admin/bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url(); ?>/assets/admin/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url(); ?>/assets/admin/dist/js/demo.js"></script>
</body>
</html>
