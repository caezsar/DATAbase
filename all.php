<?php

include 'head.php';

if($isdadmin =='admin')
		{ 

$sql = "select * from info LIMIT 40";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);

if ($result->num_rows > 0) {
    // output data of each row
 ?>

       <div class="box col-md-4 " >
            <div class="box-header col-md-2">
              <h3 class="box-title">All Data: </h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
              <table id="results" class="table table-bordered table-hover">
                <thead>
<?php


   echo "<tr><th>ID</th><th>IDs</th><th>Rec by</th><th>Name</th><th>Prenume</th><th>Delete</th><th>View</th>   </tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
     
 echo "<tr>";
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['user_ids'] . '</td>';
		echo '<td>' . $row['in_user'] . '</td>';
		echo '<td>' . $row['nume'] . '</td>';
		echo '<td>' . $row['prenume'] . '</td>';
		
		echo '<td><a href="delete-table.php?id=' . $row['id'] . '&photo=' . $row['photo'] . '&nume=' . $nume . '&ids='.$row['user_ids']. '">Delete</a></td>';
		echo '<td><a href="view.php?id=' . $row['id'] . '&nume=' . $row['in_user'] . '">View</a></td>';
		echo "</tr>"; 

     }
     echo " </tbody></table>";
?>

            </div>
			 <div class="box-footer clearfix">
			 	<div id="pageNavPosition"></div>

	<script type="text/javascript"><!--
        var pager = new Pager('results', 20); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    </script>
    
            </div>
            <!-- /.box-body -->
          </div>
		  
<?php

} else {
	
?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-red">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3>  No results returned! </h3></div></div></div></a>";
}
$conn->close();

echo "<p>Total number of records to database: $count </p>";
echo '<p><td><a href="home.php">Back</a></td></p>';
	}

else {

	?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-red">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3> You are not an admin user! </h3></div></div></div></a>";

	}

 include 'footer.php';
?>



	