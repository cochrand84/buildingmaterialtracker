<?php 
require "includes/header.php";
include "includes/password_protect.php"; 
?>
 
<div class="container">
<form method="get" action="search.php"enctype="multipart/form-data">
<div class="row">
      <div class="col-25">
        <label for="search">Search (Coil # or Customer Lastname)</label>
      </div>
      <div class="col-75">
        <input type="text" name="editid" id="editid">
      </div>
    </div>
</form>
</div>

 <div class="row">
      <input type="submit" value="Submit">
    </div>
<?php 
 
require "includes/footer.php"; 
?>