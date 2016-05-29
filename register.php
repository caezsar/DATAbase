<?php
include_once 'head.php';

if(!isset($_SESSION['user'])!="")
{
	echo "<script>alert('Sorry, only admin user can register new users!');</script>";

}


else {
if($isdadmin =='admin'){ 
?>

   <section class="content">
     <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Adauga user pt baza de date</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
 <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
            
                  <input class="form-control"  name="uname" placeholder="User Name" required>
                </div>
                <div class="form-group">
               
                  <input class="form-control" type="password" name="pass" placeholder="Password" required >
                </div>
				 <div class="form-group">
                  <p><input type="checkbox" name="admin" value="admin"> Make user admin?<br></p>
                </div>
               
              <div class="box-footer">
                <button class="btn btn-primary"type="submit" name="btn-signup">Inregistreaza-ma!</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
		  </div></div>
		  </section>
<?php

if(isset($_POST['btn-signup']))
{

	$upass = mysqli_real_escape_string($conn, $_POST['pass']);
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$upass = trim($upass);
	$uname = trim("$uname");
	$uname = str_replace(' ', '', $uname);
	$upass = str_replace(' ', '', $upass);	
	$admin = trim($_POST['admin']);
	
if($uname ==''){ 
	?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-red">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3> Empty fields in username are not allowed!! </h3></div></div></div></a>";

}
else{
	
$query = "SELECT user_name FROM users WHERE user_name='$uname'";
$result = $conn->query($query);
$count = mysqli_num_rows($result);
	
	if($count == 0){
		
		if(mysqli_query($conn, "INSERT INTO users(user_name, user_pass, admin) VALUES('$uname','$upass', '$admin')"))
		{
$path='./user_data/'.$uname;
if (!mkdir($path, 0777, true)) {
    die('Failed to create folders...');
}
	?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-green">
            <span class="info-box-icon bg-green"><i class="fa fa-thumbs-o-up"></i></span>
<?php			
echo "<div class=info-box-content><h3> User $uname succcessfully created! Wait two seconds to redirect to users... </h3></div></div></div></a>";
			?>
<script> setTimeout(function(){window.location.href='view-users.php'},2000);</script>
			<?php
		}
		else
		{
	?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-red">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3> Error at $uname registration! Wait two seconds to redirect to users... </h3></div></div></div></a>";
			?>
<script> setTimeout(function(){window.location.href='view-users.php'},2000);</script>
			<?php
		}		
	}
	else{
		?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-green">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-up"></i></span>
<?php			
echo "<div class=info-box-content><h3> User $uname is already registred! Wait two seconds to redirect to users... </h3></div></div></div></a>";
			?>
<script> setTimeout(function(){window.location.href='view-users.php'},2000);</script>
			<?php
	}
	
}
		}
}	

else {
	?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-red">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3> You are not an admin user! </h3></div></div></div></a>";

	}
	}
	 include 'footer.php';
?>

