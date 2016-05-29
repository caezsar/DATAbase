<?php

include_once 'head.php';	
if($isdadmin =='admin')
		{ 

 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];


$sql = "SELECT * FROM users WHERE user_id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

$extracted_pass	= $row['user_pass'];

	
$sql = "UPDATE users SET user_pass='password' WHERE  user_id=$id";
if(mysqli_query($conn, $sql)){

?>
        <div class="col-xs-12">
          <a href=view-users.php><div class="info-box bg-green">
            <span class="info-box-icon bg-green"><i class="fa fa-thumbs-o-up"></i></span>
<?php			
echo "<div class=info-box-content><h3> Password successfully changed to 'password'! </h3></div></div></div></a>";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}




}



} else {
	
?>
        <div class="col-xs-12">
          <a href=view-users.php><div class="info-box bg-red">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3>  No results returned! </h3></div></div></div></a>";
}

 
// close connection
mysqli_close($conn);
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
 	include_once 'footer.php';
?>