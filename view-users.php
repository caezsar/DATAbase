<?php

include 'head.php';

if($isdadmin =='admin')
		{ 
$sql = "select user_id, user_name, admin FROM users";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);

if ($result->num_rows > 0) {
  
 ?>

       <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Record Details: </h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
              <table id="results" class="table table-hover table-bordered">
                <thead>
<?php

   echo "<tr><th>ID</th><th>Username</th><th>Admin?<th>#</th><th>Admin?</th><th>Admin?</th><th>Password</th><th>Password</th></thead><tbody>";
    while($row = $result->fetch_assoc()) {
     
 echo "<tr>";
		echo '<td>' . $row['user_id'] . '</td>';
		echo '<td>' . $row['user_name'] . '</td>';
		echo '<td>' . $row['admin'] . '</td>';
		
		
		echo '<td><a href="delete-users.php?id=' . $row['user_id'] . '&user_name=' . $row['user_name'] .'">Delete</a></td>';
		echo '<td><a href="make-admin.php?id=' . $row['user_id'] . '">yes</a></td>';
		echo '<td><a href="make-noadmin.php?id=' . $row['user_id'] . '">no</a></td>';	
		echo '<td><a href="chpasswd.php?id=' . $row['user_id'] . '">Change</a></td>';	
		echo '<td><a href="rpasswd.php?id=' . $row['user_id'] . '">Reset</a></td>';
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
    echo "0 results";
}
echo "<p>Total number of records to database: $count </p>";

$conn->close();
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



	