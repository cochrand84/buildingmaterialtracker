<?php 
require "includes/header.php";
include "includes/password_protect.php"; 
?>
 
<div class="container">
<form method="get" action="search.php"enctype="multipart/form-data">
<div class="row">
      <div class="col-25">
        <label for="notes">Search (Coil # or Customer Lastname)</label>
      </div>
      <div class="col-75">
        <input type="text" name="searchid" id="searchid">
      </div>
    </div>
</form>
</div>

 <div class="row">
      <input type="submit" name="search" value="Search">
    </div>
<?php 
 
require "includes/footer.php"; 
?>