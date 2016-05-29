<?php

include 'head.php';

?>
   <section class="content">
     <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Adauga informatii in baza de date</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
 <form role="form" action="insert.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nume</label>
                  <input type="text" class="form-control" name="nume" placeholder="Name" required >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Prenume</label>
                  <input type="text" class="form-control" name="prenume" placeholder="Prenume" required>
                </div>
				 <div class="form-group">
                  <label for="exampleInputPassword1">Selecteaza data</label>
                  <p><input type="date" name="date" placeholder="01/01/2016 "></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="photo">

                  <p class="help-block">Uploadeaza o fotografie:</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Information</label>
                  <p><textarea type="textarea" name="text" rows="10" cols="70" placeholder="Enter a description..."></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
		  </div></div>
		  </section>
		  



<?php

include 'footer.php';
?>