<?php

include_once 'dbconnect.php';
include_once 'session_id.php';

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
 // get id value
 $id = $_GET['id'];

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['nume']);
$prenume = mysqli_real_escape_string($conn, $_POST['prenume']);
$txt = mysqli_real_escape_string($conn, $_POST['text']);
$user = mysqli_real_escape_string($conn, $_POST['user']);
$ids = mysqli_real_escape_string($conn, $_POST['ids']);

if ($sessionid == $ids){
	
	
	
if($name && $prenume){
	
$sql = "UPDATE info SET nume='$name', prenume='$prenume', text='$txt' WHERE  id=$id";


if(mysqli_query($conn, $sql)){
	
	header("location:./view.php?id=$id&nume=$user");

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// close connection
mysqli_close($conn);
}
else{
	?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-red">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3> Provide a Name and Prenume! </h3></div></div></div></a>";
}


}

 else {

 include 'head.php';
	?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3> You are not the user of the article! </h3></div></div></div></a>";

 }


}
 
 include 'footer.php';
?>