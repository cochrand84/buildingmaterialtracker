<?php
require "includes/header.php";
include "includes/password_protect.php"; 

if (isset($_POST['submit'])) {

    require "includes/config.php";

	try  {
        $connection = new PDO($dsn, $username, $password, $options);
        $new_ticket = array(
            "firstname"                     => $_POST['firstname'],
            "lastname"                      => $_POST['lastname'],
            "date"                          => $_POST['date'],
            "address"                       => $_POST['address'],
            "city"                          => $_POST['city'],
            "state"                         => $_POST['state'],
            "phone"                         => $_POST['phone'],
            "cellphone"                     => $_POST['cellphone'],
            "color"                         => $_POST['color'],
            "gauge"                         => $_POST['gauge'],
            "coil1"                         => $_POST['coil1'], 
            "coil2"                         => $_POST['coil2'],
            "del"                           => $_POST['del'],
            "pickuptime"                    => $_POST['pickuptime'],
            "qty1"                          => $_POST['qty1'],
            "length1"                       => $_POST['length1'],
            "desc1"                         => $_POST['desc1'],
            "qty2"                          => $_POST['qty2'],
            "length2"                       => $_POST['length2'],
            "desc2"                         => $_POST['desc2'],
            "qty3"                          => $_POST['qty3'],
            "length3"                       => $_POST['length3'],
            "desc3"                         => $_POST['desc3'],
            "qty4"                          => $_POST['qty4'],
            "length4"                       => $_POST['length4'],
            "desc4"                         => $_POST['desc4'],
            "qty5"                          => $_POST['qty5'],
            "length5"                       => $_POST['length5'],
            "desc5"                         => $_POST['desc5']
        );   

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "tickets",
                implode(", ", array_keys($new_ticket)),
                ":" . implode(", :", array_keys($new_ticket))
        );
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_ticket);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    
}

?>

<body>
Logged in as <?php echo $login ?>
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
      <option value="ashgrey">Ash Grey</option>
      <option value="charcoal">Charcoal</option>
      <option value="black">Black</option>
      <option value="burnishedslate">Burnished Slate</option>
      <option value="barnred">Barn Red</option>
      <option value="brightred">Bright Red</option>
      <option value="white">White</option>
      <option value="cocoabrown">Cocoa Brown</option>
      <option value="saharatan">Sahara Tan</option>
      <option value="lightstone">Light Stone</option>
      <option value="burgundy">Burgundy</option>
      <option value="hawaiianblue">Hawaiian Blue</option>
      <option value="regalblue">Regal Blue</option>
      <option value="galvalume">Galvalume</option>
      <option value="green">Green</option>
      <option value="copper">Copper</option>
    </select>
      
    </div>
	  </div>
	      <div class="row">
      <div class="col-25">
        <label for="gauge">Gauge</label>
      </div>
      <div class="col-75">
          
    <select id="gauge" name="gauge" >
      <option value="26">26</option>
      <option value="29">29</option>
    </select>
      
    </div>
	  </div>
    <div class="row">
      <div class="col-25">
        <label for="coil1">Coil 1</label>
      </div>
      <div class="col-75">
          
    <select id="coil1" name="coil1" >
      <option value="717341055-3">717341055-3</option>
      <option value="31">31</option>
    </select>
      
    </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="coil2">Coil 1</label>
      </div>
      <div class="col-75">
          
    <select id="coil1" name="coil1" >
      <option value="717341055-3">717341055-3</option>
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
		<input type="text" id="qty1" size="20" name="qty1" value="" placeholder="Qty" /><input type="text" id="length1" size="40" name="length1" value="" placeholder="Length" /><input type="text" id="desc1" size="40" name="desc1" value="" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
		      <p>
		<input type="text" id="qty2" size="20" name="qty2" value="" placeholder="Qty" /><input type="text" id="length2" size="40" name="length1" value="" placeholder="Length" /><input type="text" id="desc2" size="40" name="desc2" value="" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
		      <p>
		<input type="text" id="qty3" size="20" name="qty3" value="" placeholder="Qty" /><input type="text" id="length3" size="40" name="length3" value="" placeholder="Length" /><input type="text" id="desc3" size="40" name="desc3" value="" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
		      <p>
		<input type="text" id="qty4" size="20" name="qty4" value="" placeholder="Qty" /><input type="text" id="length4" size="40" name="length4" value="" placeholder="Length" /><input type="text" id="desc4" size="40" name="desc4" value="" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
		      <p>
		<input type="text" id="qty5" size="20" name="qty5" value="" placeholder="Qty" /><input type="text" id="length5" size="40" name="length5" value="" placeholder="Length" /><input type="text" id="desc5" size="40" name="desc5" value="" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
</div>
    <div class="row">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</div>
<?php 
require "includes/footer.php"; 
?>
</body>
</html>
