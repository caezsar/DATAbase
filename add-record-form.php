<?php

include_once 'head.php';

?>
   <section class="content">
     <div class="row">
        <!-- left column -->

          <div class="box box-danger">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </div>	
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
                  <label for="exampleInputPassword1">Suplimentar</label>
                  <input type="text" class="form-control" name="prenume" placeholder="Add extra info" required>
				</div>
				
              <div class="form-group">
                <label>Selecteaza data</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date" class="form-control pull-right" data-provide="datepicker" data-date-format="dd-mm-yyyy">
                </div>
              </div>		

				
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="photo">

                  <p class="help-block">Uploadeaza o fotografie:</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Information</label>
                  <p><textarea name="text" id="editor1" rows="10" cols="80"></textarea>
			<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
		  </div>
		  </section>
		  



<?php

include 'footer.php';
?>

