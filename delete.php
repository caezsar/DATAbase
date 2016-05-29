<?php
include_once 'head.php';

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
if($name){
	
	
$sql1 = "select * FROM info WHERE nume='$name' AND user_ids='$sessionid'";
$result1 = $conn->query($sql1);
$row1=mysqli_fetch_array($result1);
$photo = $row1['photo'];
$nume = $row1['in_user'];
$target='./user_data/'.$nume.'/';

$id=$row1['id'];
		if($id) {
// attempt insert query execution
$sql = "delete from info WHERE id='$id' AND user_ids='$sessionid'";
					if(mysqli_query($conn, $sql)){
								unlink($target. $photo);
						?>
							<div class="col-xs-12">
							<a href=home.php><div class="info-box bg-green">
							<span class="info-box-icon bg-green"><i class="fa fa-thumbs-o-up"></i></span>
							<?php			
							echo "<div class=info-box-content><h3>  Record deleted! </h3></div></div></div></a>";

					} else{
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
					}
 
						// close connection
						mysqli_close($conn);
					}
		else {
	?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-red">
            <span class="info-box-icon bg-green"><i class="fa fa-thumbs-o-up"></i></span>
<?php			
echo "<div class=info-box-content><h3>  The username $name could not be found! </h3></div></div></div></a>";

		
		}
}


else{
		?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-red">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3>  Enter a name to delete! </h3></div></div></div></a>";
}

include 'footer.php';
?>