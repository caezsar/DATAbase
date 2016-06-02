<?php
session_start();
include_once 'dbconnect.php';
include_once 'session_id.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE Database | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script type="text/javascript" src="plugins/paging.js"></script>
  <link rel="stylesheet" href="plugins/paging.css">
  
  <!--  TINYMCE editor
  <script type="text/javascript" src="plugins/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea',  plugins: "link, image, code, anchor"  });</script>
  -->
  
   <script src="plugins/ckeditor-full/ckeditor.js"></script>
   
   
  <!--  TABLE Order
  -->  
<script src="plugins/jquery-1.12.3.min.js"></script>  
<script src="plugins/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="plugins/jquery.dataTables.min.css">

<script type="text/javascript">
 $(document).ready(function() { $('#example').DataTable();} );
</script>
		   
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="./" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>DATA</b>base</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DATA</b>base</span>
    </a>
    <!-- Header Navbar: style can be found in header.less navbar navbar-default navbar-fixed-top-->
    <nav class="navbar navbar-fixed-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
     

	 <a href="./all.php" class="sidebar-toggle" > All Tables</a>
	  	 <a href="./home.php" class="sidebar-toggle" > Home</a>
      <div class="navbar-custom-menu">
	  
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">  
 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<span class="hidden-xs">
	   <span class="label label-success"><i class="fa fa-user"></i> User: <?php echo $row['user_name']; ?></span>
 </span> </a></li>
 
 
           <li class="dropdown user user-menu">  
 <a href="logout.php?logout" class="dropdown-toggle">
<span class="hidden-xs">
	   <span class="label label-danger"><i class="fa  fa-sign-out"></i> Log Out</span>
 </span> </a></li>
 
 

          <li class="dropdown user user-menu">
		  
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<span class="hidden-xs"> <span class="label label-warning"><i class="fa fa-cog"></i>  ID:  <?php echo $row['user_id']; echo " " . $isdadmin; ?></span>  </span>
            </a>

            <ul class="dropdown-menu">
 
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="uchpasswd.php" class="btn btn-default btn-flat">Change Pass</a>
            
                  <a href="logout.php?logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-dashboard "></i></a>
          </li>
        </ul>
	     <ul class="nav navbar-nav">


		
		
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
         <a ><p><h4><i class="fa fa-user"></i> Hi'  <?php echo $row['user_name']; ?></h4></p> </a>
          <i class="fa fa-circle text-success"></i> <a href="logout.php?logout"></i> Sign Out</a></a>
        </div>
        <div class="pull-left info">
          
        </div>
      </div>
	  <hr></hr>
      <!-- search form -->
      <form action="search-full.php" method="post" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="names" class="form-control" placeholder="Search..." required>
              <span class="input-group-btn">
                <button type="submit" name="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        
        <li class="treeview">
          <a href="home.php">
            <i  class="fa fa-table"></i> <span >RECORDS</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>

        <li class="treeview">
<a href="add-record-form.php"><i  class="fa fa-circle-o text-aqua"></i> <span > Add Record</span> 
          </a>
        </li>
        <li class="treeview">
<a href="del-record-form.php"><i  class="fa fa-circle-o text-red"></i> <span > Del Record</span> 
          </a>
        </li>

<p>
		
      <!-- search form -->
      <form action="search.php" method="post" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="names" class="form-control" placeholder="Search in your ID" required >
              <span class="input-group-btn">
                <button type="submit" name="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
</p>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>USERS</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>

<?php
if($isdadmin == 'admin'){
	
?>

        <li class="treeview">
          <a href="register.php">
            <i class="fa fa-circle-o text-aqua"></i>
            <span>Register User</span>
          </a>
        </li>
	
        <li class="treeview">
          <a href="view-users.php">
            <i class="fa fa-circle-o text-yellow"></i>
            <span>View Users</span>
          </a>
        </li>
<?php
} else {
?>

        <li class="treeview">
          <a href="uchpasswd.php">
            <i class="fa fa-circle-o text-yellow"></i>
            <span>Change Password</span>
          </a>
        </li>
<?php
	
}
?>
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  
  
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
      
       <a href=all.php><i class="fa fa-th"></i> All Tables</a>
		
      </h4>
      <ol class="breadcrumb">
       
        <h5><a href="./"><i class="fa fa-dashboard"></i> Home</a></h5>
      </ol>
    </section>
	
			
    <!-- Main content -->
    <section class="content">