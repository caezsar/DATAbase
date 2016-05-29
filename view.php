<?php

include 'head.php';

 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
$id = $_GET['id'];
$nume = $_GET['nume'];
$target='./user_data/'.$nume.'/';


$sql = "SELECT nume, prenume, user_ids,in_user, id,text, date, photo,dt FROM info WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	 while($row = $result->fetch_assoc()) {
 ?>

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $row['nume'];?> </h3>

              <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </div>


            </div>
            <!-- /.box-header -->
           <div class="box-body">
		   <?php
echo '<table class="table col-md-4" ><thead  ><tr ><th><a target="_blank" href="'.$target . $row['photo'] . '"</a><img width="150px" src='.$target.'/'.$row['photo'] . '></td></tr></tbody></table>';		
?>
              <table id="example1" class="table table-hover table-bordered">
                <thead>
<?php


   echo "<tr><th>ID</th><th>IDs</th><th>Rec by</th><th>Prenume</th><th>Data</th><th>#</th><th>#</th><th>#</th>    </tr></thead><tbody>";
   
     
 echo "<tr>";
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['user_ids'] . '</td>';
		echo '<td>' . $row['in_user'] . '</td>';

		echo '<td>' . $row['prenume'] . '</td>';
		echo '<td>' . $row['date'] . '</td>';		
		echo '<td><a target="_blank" href="' . $target  .$row['photo'] . '">' . $row['photo'] . '</a></td>';
		echo '<td><a href="delete-table.php?id=' . $row['id'] . '&photo=' . $row['photo'] . '&nume=' . $nume . '&ids='.$row['user_ids']. '">Delete</a></td>';
		echo '<td><a href="update-table.php?id=' . $row['id'] . '&nume=' . $nume . '&ids='.$row['user_ids']. '">Update</a></td>';
             echo  '</tr></tbody></table><div class="box-body">';
			 
	
echo '<p> </p><table class="table table-hover table-bordered"><thead><tr><th>Information inserted on: ' . $row['dt'] . '</th></tr></tbody>';
echo '<td class="box box-primary table-hover" id="compose-textarea" class="form-control">' . $row['text'] . '</td></tr></tbody></table>';

?>
			</div>
            </div>
			 <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
		 

<?php

  }

} else {
    echo "0 results";
}
$conn->close();
 }
 include 'footer.php';
?>

