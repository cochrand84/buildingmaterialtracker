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
            "desc5"                         => $_POST['desc5'],
            "qty6"                          => $_POST['qty6'],
            "length6"                       => $_POST['length6'],
            "desc6"                         => $_POST['desc6'],
            "qty7"                          => $_POST['qty7'],
            "length7"                       => $_POST['length7'],
            "desc7"                         => $_POST['desc7'],
            "qty8"                          => $_POST['qty8'],
            "length8"                       => $_POST['length8'],
            "desc8"                         => $_POST['desc8'],
            "qty9"                          => $_POST['qty9'],
            "length9"                       => $_POST['length9'],
            "desc9"                         => $_POST['desc9'],
            "qty10"                          => $_POST['qty10'],
            "length10"                       => $_POST['length10'],
            "desc10"                         => $_POST['desc10'],
            "qty11"                          => $_POST['qty11'],
            "length11"                       => $_POST['length11'],
            "desc11"                         => $_POST['desc11'],
            "qty12"                          => $_POST['qty12'],
            "length12"                       => $_POST['length12'],
            "desc12"                         => $_POST['desc12'],
            "qty13"                          => $_POST['qty13'],
            "length13"                       => $_POST['length13'],
            "desc13"                         => $_POST['desc13'],
            "qty14"                          => $_POST['qty14'],
            "length14"                       => $_POST['length14'],
            "desc14"                         => $_POST['desc14'],
            "qty15"                          => $_POST['qty15'],
            "length15"                       => $_POST['length15'],
            "desc15"                         => $_POST['desc15'],
            "invoiceno"                     => $_POST['invoiceno'],
            "notes"                         => $_POST['notes']    
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
      <option value="trimcoil">Trim Coil</option>
    </select>
      
    </div>
	  </div>
    <div class="row">
      <div class="col-25">
        <label for="coil1">Coil 1</label>
      </div>
      <div class="col-75">
          
<input type="text" name="coil1" id="coil1" >
      
    </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="coil2">Coil 2</label>
      </div>
      <div class="col-75">
          
<input type="text" name="coil2" id="coil2" >
      
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
    <div class="row">
      <div class="col-25">
        <label for="invoiceno">Invoice No</label>
      </div>
      <div class="col-75">
        <input type="text" name="invoiceno" id="invoiceno">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="notes">Notes</label>
      </div>
      <div class="col-75">
        <input type="text" name="notes" id="notes">
      </div>
    </div>
	  <div id="addinput">
    <p>
		<input type="text" id="qty1" size="20" name="qty1" value="" placeholder="Qty" /><input type="text" id="length1" size="40" name="length1" value="" placeholder="Length" /><input type="text" id="desc1" size="40" name="desc1" value="" placeholder="Description" />
    </p>
		      <p>
		<input type="text" id="qty2" size="20" name="qty2" value="" placeholder="Qty" /><input type="text" id="length2" size="40" name="length1" value="" placeholder="Length" /><input type="text" id="desc2" size="40" name="desc2" value="" placeholder="Description" />
    </p>
		      <p>
		<input type="text" id="qty3" size="20" name="qty3" value="" placeholder="Qty" /><input type="text" id="length3" size="40" name="length3" value="" placeholder="Length" /><input type="text" id="desc3" size="40" name="desc3" value="" placeholder="Description" />
    </p>
		      <p>
		<input type="text" id="qty4" size="20" name="qty4" value="" placeholder="Qty" /><input type="text" id="length4" size="40" name="length4" value="" placeholder="Length" /><input type="text" id="desc4" size="40" name="desc4" value="" placeholder="Description" />
    </p>
		      <p>
		<input type="text" id="qty5" size="20" name="qty5" value="" placeholder="Qty" /><input type="text" id="length5" size="40" name="length5" value="" placeholder="Length" /><input type="text" id="desc5" size="40" name="desc5" value="" placeholder="Description" />
    </p>
              <p>
    <input type="text" id="qty6" size="20" name="qty6" value="" placeholder="Qty" /><input type="text" id="length6" size="40" name="length6" value="" placeholder="Length" /><input type="text" id="desc6" size="40" name="desc6" value="" placeholder="Description" />
    </p>
              <p>
    <input type="text" id="qty7" size="20" name="qty7" value="" placeholder="Qty" /><input type="text" id="length7" size="40" name="length7" value="" placeholder="Length" /><input type="text" id="desc7" size="40" name="desc7" value="" placeholder="Description" />
    </p>
              <p>
    <input type="text" id="qty8" size="20" name="qty8" value="" placeholder="Qty" /><input type="text" id="length8" size="40" name="length8" value="" placeholder="Length" /><input type="text" id="desc8" size="40" name="desc8" value="" placeholder="Description" />
    </p>
              <p>
    <input type="text" id="qty9" size="20" name="qty9" value="" placeholder="Qty" /><input type="text" id="length9" size="40" name="length9" value="" placeholder="Length" /><input type="text" id="desc9" size="40" name="desc9" value="" placeholder="Description" />
    </p>
              <p>
    <input type="text" id="qty10" size="20" name="qty10" value="" placeholder="Qty" /><input type="text" id="length10" size="40" name="length10" value="" placeholder="Length" /><input type="text" id="desc10" size="40" name="desc10" value="" placeholder="Description" />
    </p>
              <p>
    <input type="text" id="qty11" size="20" name="qty11" value="" placeholder="Qty" /><input type="text" id="length11" size="40" name="length11" value="" placeholder="Length" /><input type="text" id="desc11" size="40" name="desc11" value="" placeholder="Description" /><?php include "includes/canvas_image.php"; ?>
    </p>
              <p>
    <input type="text" id="qty12" size="20" name="qty12" value="" placeholder="Qty" /><input type="text" id="length12" size="40" name="length12" value="" placeholder="Length" /><input type="text" id="desc12" size="40" name="desc12" value="" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
              <p>
    <input type="text" id="qty13" size="20" name="qty13" value="" placeholder="Qty" /><input type="text" id="length13" size="40" name="length5" value="" placeholder="Length" /><input type="text" id="desc13" size="40" name="desc13" value="" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
              <p>
    <input type="text" id="qty14" size="20" name="qty14" value="" placeholder="Qty" /><input type="text" id="length14" size="40" name="length14" value="" placeholder="Length" /><input type="text" id="desc14" size="40" name="desc14" value="" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
              <p>
    <input type="text" id="qty15" size="20" name="qty15" value="" placeholder="Qty" /><input type="text" id="length15" size="40" name="length15" value="" placeholder="Length" /><input type="text" id="desc15" size="40" name="desc15" value="" placeholder="Description" /><?php include "includes/draw.php"; ?>
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
