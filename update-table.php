<?php

include 'head.php';


 // check if the 'id' variable is set in URL, and check that it is valid
if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
$ids = $_GET['ids'];

if ($sessionid == $ids){
	
 // attempt insert query execution
$sql = "SELECT * FROM info WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
   <section class="content">
     <div class="row">
        <!-- left column -->

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Adauga informatii in baza de date</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<form role="form" action='start-update-table.php?id=<?php echo $row['id']; ?>' method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nume</label>
                  <input type="text" class="form-control" name="nume" value="<?php echo $row['nume']; ?>" required >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Suplimentar</label>
                  <input type="text" class="form-control" name="prenume" value="<?php echo $row['prenume']; ?>" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Information</label>
                  <p><textarea name="text" id="editor1" rows="10" cols="80" > <?php echo $row['text']; ?> </textarea>
			<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
                </div>
              </div>
		
		<input type="hidden" value="<?php echo $row['in_user']; ?>" name="user" />
		<input type="hidden" value="<?php echo $row['user_ids']; ?>" name="ids" />
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
		  </div>
		  </section>
<?php
  }

} else {
    echo "0 results";
}
 } else {


	?>
        <div class="col-xs-12">
          <a href=home.php><div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-red"></i></span>
<?php			
echo "<div class=info-box-content><h3> You are not the user of the article! </h3></div></div></div></a>";

 }
// close connection
mysqli_close($conn);
}



include 'footer.php';
?>