<?php

include_once 'head.php';

?>
   <section class="content">
     <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
 <form role="form" action="upasswd.php?id=<?php echo $sessionid; ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Old password</label>
                  <input type="password" class="form-control" name="oldpasswd" placeholder=" " required >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New password</label>
                  <input type="password" class="form-control" name="newpasswd" placeholder=" " required>
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