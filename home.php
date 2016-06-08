<?php

include_once 'head.php';


if($isdadmin =='admin')
		{ 
$sql = "select id, user_ids, in_user, nume, prenume, photo from info where user_ids='$sessionid' LIMIT 40";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);




if ($result->num_rows > 0) {
    // output data of each row
?>

          <div class="box box-warning">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </div>			
              <h3 class="box-title">Data for user: <?php echo $sessionname; ?> </h3>
            </div>
			
            <!-- /.box-header -->
           <div class="box-body">
              <table id="example" class="table table-hover table-bordered ">
                <thead>
<?php
				
   echo "<tr><th>Logo</th><th>ID</th><th>IDs</th><th>Rec by</th><th>Name</th><th>Suplimentar</th><th>Delete</th><th>View</th>   </tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
     
 echo "<tr>";
 echo '<td><a href="view.php?id=' . $row['id'] . '&nume=' . $row['in_user'] . '"><img width="80px" height="42" src=user_data/' . $sessionname . '/'. $row['photo'] . '></a></td>';
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['user_ids'] . '</td>';
		echo '<td>' . $row['in_user'] . '</td>';
		echo '<td>' . $row['nume'] . '</td>';
		echo '<td>' . $row['prenume'] . '</td>';
		
		echo '<td><a href="delete-table.php?id=' . $row['id'] . '&photo=' . $row['photo'] . '&nume=' . $row['in_user'] . '&ids='.$row['user_ids']. '">Delete</a></td>';
		echo '<td><a href="view.php?id=' . $row['id'] . '&nume=' . $row['in_user'] . '">View</a></td>';


     }
?>
              </tr></tbody>
              </table>
            </div>
			 <div class="box-footer clearfix">
 			 	<div id="pageNavPosition" ></div>

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
          <a href=add-record-form.php><div class="info-box bg-red">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3>  No record returned! Please add one! </h3></div></div></div></a>";
		
}
echo "<p>Total number of records to database: $count </p>";
echo '<p><td><a href="all.php">Show all records</a></td></p>';
$conn->close();
	}

else {

$sql = "select id, in_user, nume, prenume,photo from info where user_ids='$sessionid'";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);

if ($result->num_rows > 0) {
	
?>

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Database Records:</h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
              <table id="results" class="table table-bordered table-hover">
                <thead>
<?php

   echo "<tr><th>Logo</th><th>ID</th><th>Name</th><th>Suplimentar</th><th>Delete</th><th>View</th>   </tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
     
 echo "<tr>";
 echo '<td><a href="view.php?id=' . $row['id'] . '&nume=' . $row['in_user'] . '"><img width="80px" height="42" src=user_data/' . $sessionname . '/'. $row['photo'] . '></a></td>';
		echo '<td>' . $row['id'] . '</td>';

		echo '<td>' . $row['nume'] . '</td>';
		echo '<td>' . $row['prenume'] . '</td>';
		
		echo '<td><a href="delete-table.php?id=' . $row['id'] . '&photo=' . $row['photo'] . '&nume=' . $nume .'">Delete</a></td>';
		echo '<td><a href="view.php?id=' . $row['id'] . '&nume=' . $row['in_user'] . '">View</a></td>';
  }
?>
              </tr></tbody>
              </table>
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


<?php

} else {
 ?>
        <div class="col-xs-12">
          <a href=add-record-form.php><div class="info-box bg-red">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3>  No record returned! Please add one! </h3></div></div></a>";
		
}

echo "</div><p>Total number of records to database: $count </p>";

		           
$conn->close();

	}

include 'footer.php';
?>

