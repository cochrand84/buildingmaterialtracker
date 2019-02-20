<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script  src="<span id="IL_AD8" class="IL_AD">https</span>://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>        
<script type="text/javascript">
$(function() {
var addDiv = $('#addinput');
var i = $('#addinput p').size() + 1;

$('#addNew').live('click', function() {
$('<p><input type="text" id="qty_new" size="20" name="qty_' + i +'" value="" placeholder="Qty" /><input type="text" id="length_new" size="40" name="length_' + i +'" value="" placeholder="Qty" /><input type="text" id="desc_new" size="40" name="desc_' + i +'" value="" placeholder="Qty" /><a href="#" id="remNew">Remove</a> </p>').appendTo(addDiv);
i++;

return false;
});

$('#remNew').live('click', function() {
if( i > 2 ) {
$(this).parents('p').remove();
i--;
}
return false;
});
});

</script>

</head>

<body>

<h2>Create a new ticket</h2>
<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="firstname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" name="firstname" id="firstname" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lastname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" name="lastname" id="lastname" required>
      </div>
    </div>
	  <div class="row">
      <div class="col-25">
        <label for="date">Date</label>
      </div>
      <div class="col-75">
        <input type="date" name="date" value="" min="<?php echo date("Y-m-d"); ?>" required>
      </div>
	  </div>
    <div class="row">
      <div class="col-25">
        <label for="address">Address</label>
      </div>
      <div class="col-75">
        <input type="text" name="address" id="address" >
      </div>
    </div>
	      <div class="row">
      <div class="col-25">
        <label for="city">City</label>
      </div>
      <div class="col-75">
        <input type="text" name="city" id="city" >
      </div>
    </div>
	  	      <div class="row">
      <div class="col-25">
        <label for="state">State</label>
      </div>
      <div class="col-75">
        <input type="text" name="state" id="state" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone">Phone Number</label>
      </div>
      <div class="col-75">
        <input type="tel" name="phone" id="phone">
      </div>
    </div>
	  <div class="row">
      <div class="col-25">
        <label for="cellphone">Cell Number</label>
      </div>
      <div class="col-75">
        <input type="tel" name="cellphone" id="cellphone">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="color">Color</label>
      </div>
      <div class="col-75">
          
    <select id="color" name="color" >
      <option value="barnred">Barn Red</option>
      <option value="2">Ash Grey</option>
    </select>
      
    </div>
	  </div>
	      <div class="row">
      <div class="col-25">
        <label for="gauge">Gauge</label>
      </div>
      <div class="col-75">
          
    <select id="gauge" name="gauge" >
      <option value="29">29</option>
      <option value="31">31</option>
    </select>
      
    </div>
	  </div>
	  <div class="row">
      <div class="col-25">
        <label for="del">Delivery</label>
      </div>
      <div class="col-75">
        <input type="checkbox" name="del" id="del">
      </div>
    </div>
	  	  <div class="row">
      <div class="col-25">
        <label for="pickuptime">Pick-up Time</label>
      </div>
      <div class="col-75">
        <input type="text" name="pickuptime" id="pickuptime">
      </div>
    </div>
	  <div id="addinput">
    <p>
		<input type="text" id="qty_new" size="20" name="qty" value="" placeholder="Qty" /><input type="text" id="length_new" size="40" name="length" value="" placeholder="Length" /><input type="text" id="desc_new" size="40" name="desc_new" value="" placeholder="Description" /><a href="#" id="addNew">Add</a>
    </p>
</div>
    <div class="row">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>