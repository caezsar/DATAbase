<?php

include_once 'head.php';

?>

<div class="col-md-4">
      <form action="delete.php" method="post">
                 <div class="input-group input-group-sm">
                <input name="name" type = "text" class="form-control" required><span class="input-group-btn" >
                 <button type = "submit" class="btn btn-info btn-flat"> Delete </button>
                    </span>
              </div>
               </form>
</div>
<?php
 include 'footer.php';
?>