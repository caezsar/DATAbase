<?php

include 'head.php';

$names = mysqli_real_escape_string($conn, $_POST['names']);
if($names){
if($isdadmin =='admin')
		{ 

$sql = "SELECT * FROM info WHERE nume LIKE '%$names%' or prenume LIKE '%$names%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 ?>

       <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Record Details: </h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
              <table id="results" class="table table-bordered">
                <thead>
<?php


   echo "<tr><th>ID</th><th>IDs</th><th>Rec by</th><th>Name</th><th>Prenume</th><th> # </th><th> # </th>   </tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
     
 echo "<tr>";
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['user_ids'] . '</td>';
		echo '<td>' . $row['in_user'] . '</td>';
		echo '<td>' . $row['nume'] . '</td>';
		echo '<td>' . $row['prenume'] . '</td>';
		
		echo '<td><a href="view.php?id=' . $row['id'] . '&nume='.$row['in_user'] .'">Wiew</a></td>';
		echo '<td><a href="delete-table.php?id=' . $row['id'] . '&photo=' . $row['photo'] . '&nume=' . $row['in_user'] . '">Delete</a></td>';
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

	}

else {

$sql = "SELECT * FROM info WHERE nume LIKE '%$names%' or prenume LIKE '%$names%' AND user_ids='$sessionid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  ?>

       <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Record Details: </h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
<?php

	echo "<p>Non-admin users can perform only their own records search!</p>";

   echo "<tr><th>ID</th><th>Name</th><th>Prenume</th><th> # </th><th> # </th>   </tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
     
 echo "<tr>";
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['nume'] . '</td>';
		echo '<td>' . $row['prenume'] . '</td>';
		
		echo '<td><a href="view.php?id=' . $row['id'] . '&nume='.$row['in_user'] .'">Wiew</a></td>';
		echo '<td><a href="delete-table.php?id=' . $row['id'] . '&photo=' . $row['photo'] . '&nume=' . $row['in_user'] . '">Delete</a></td>';
		echo "</tr>"; 

     }
     echo " </tbody></table>";
?>
	
            </div>
			 <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                
              </ul>
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

	}
}
else{
	?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-red">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>
<?php			
echo "<div class=info-box-content><h3> Provide a Name! </h3></div></div></div></a>";

}
include 'footer.php';
?>



	