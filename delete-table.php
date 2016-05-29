<?php

include_once 'dbconnect.php';
include_once 'session_id.php';


 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['photo']))
 {
 // get id value
$id = $_GET['id'];
$photo = $_GET['photo'];
$nume = $_GET['nume'];
$target='./user_data/'.$nume.'/';
$ids = $_GET['ids'];

if ($sessionid == $ids){
 // attempt insert query execution
 
$sql = "delete from info WHERE id=$id";
if(mysqli_query($conn, $sql)){
		unlink($target.'/'. $photo);
?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
<?php			
echo "<div class=info-box-content><h3>The record <strong>". $nume . "</strong> with the ID <strong>". $id. "</strong> and the file <strong>". $photo. "</strong> had been deleted!  GO HOME </h3></div></div></div></a>";
	header("location: home.php");

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// close connection
mysqli_close($conn);

 } else {

 include 'head.php';
	?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-red"></i></span>
<?php			
echo "<div class=info-box-content><h3> You are not the user of the article! </h3></div></div></div></a>";

 }
}
include 'footer.php';
?>