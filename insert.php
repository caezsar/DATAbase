<?php

include_once 'dbconnect.php';
include_once 'session_id.php';

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['nume']);
$prenume = mysqli_real_escape_string($conn, $_POST['prenume']);
$txt = mysqli_real_escape_string($conn, $_POST['text']);
$date = mysqli_real_escape_string($conn, $_POST['date']);

if($name && $prenume){

$target='./user_data/'.$sessionname.'/';
if (!is_dir($target)) {
    mkdir($target, 0777, true);       
}

$target = $target . basename( $_FILES['photo']['name']); 


if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
<?php   

	header("location: home.php");
} else{
    echo "There was an error uploading the file, please try again!";
}

$pic=($_FILES['photo']['name']); 
 

$sql = "INSERT INTO info (user_ids, nume, prenume, in_user, text, date, photo) VALUES ('$sessionid', '$name', '$prenume',  '$sessionname','$txt', '$date', '$pic')";
if(mysqli_query($conn, $sql)){
	
	header("location:./index.php");

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
 include 'footer.php';
?>