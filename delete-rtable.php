<?php

include_once 'dbconnect.php';
include_once 'session_id.php';


 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
$id = $_GET['id'];

$sql = "delete from SystemEvents WHERE ID=$id";
if(mysqli_query($conn, $sql)){
		
	header("location: rsyslog.php");

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// close connection
mysqli_close($conn);

}
include 'footer.php';
?>