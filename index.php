<link rel="stylesheet" href="css/style.css">
<?php include "includes/header.php"; 
include "includes/password_protect.php"; 

?>
<form method="get" action="edit2.php"enctype="multipart/form-data">
<div class="row">     
        <div class="col-25">
            <label for="editid">Ticket number or select below</label>
        </div>
        <div class="col-25">
            <input type="text" name="editid" id="editid">
        </div>
    </div> 
    <div class="row">
        <input type="submit" value="Submit">
    </div>
        </form>
<?php 
 
require "includes/footer.php"; 
?>