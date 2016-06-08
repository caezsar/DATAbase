<?php

include_once 'head.php';

if($isdadmin =='admin')
		{ 

$sql = "select * from SystemEvents ORDER BY ID DESC LIMIT 500";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);

if ($result->num_rows > 0) {
    // output data of each row
 ?>

          <div class="box box-danger">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </div>			
              <h3 class="box-title">All Data: </h3>
            </div>
			
            <!-- /.box-header -->
           <div class="box-body">
              <table id="example" class="table table-bordered table-hover">
                <thead>
<?php


   echo "<tr><th>ID</th><th>ReceivedAt</th><th>Facility</th><th>Priority</th><th>FromHost</th><th>SysLogTag</th><th>Message</th><th>Delete</th>   </tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
     
 echo "<tr>";
		echo '<td>' . $row['ID'] . '</td>';
		echo '<td>' . $row['ReceivedAt'] . '</td>';
		echo '<td>' . $row['Facility'] . '</td>';
		echo '<td>' . $row['Priority'] . '</td>';
		echo '<td>' . $row['FromHost'] . '</td>';
		echo '<td>' . $row['SysLogTag'] . '</td>';
		echo '<td>' . $row['Message'] . '</td>';
		
		echo '<td><a href="delete-rtable.php?id=' . $row['ID'] .'">Delete</a></td>';
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



	