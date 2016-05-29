<?php

include_once 'dbconnect.php';
include_once 'session_id.php';

if($isdadmin =='admin')
		{ 

 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['user_name']))
 {
 // get id value
 $id = $_GET['id'];
 $name = mysqli_real_escape_string($conn, $_GET['user_name']);
 $name = trim("$name");
 $name = str_replace(' ', '', $name);
if($sessionid == $id){
include_once 'head.php';
 ?>
        <div class="col-xs-12">
          <a href=view-users.php><div class="info-box bg-red">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3> The user $sessionname is an admin! You can't delete the user while still logged in!  </h3></div></div></div></a>";
	
include 'footer.php';
}
else {
 // attempt insert query execution
$sql = "delete from users WHERE user_name='$name'";
if(mysqli_query($conn, $sql)){

$dir='./user_data/'.$name;	
exec("rm -rf {$dir}");
	
header("location: view-users.php");


} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// close connection
mysqli_close($conn);
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

?>