<?php
require "includes/header.php";
include "includes/password_protect.php"; 

if (isset($_POST['submit'])) {

    require "includes/config.php";
    require "includes/common.php";  

	try  {
        $connection = new PDO($dsn, $username, $password, $options);
        $new_ticket = array(
            "vendorcoilno"                     => $_POST['vendorcoilno'],
            "lbmcoilno"                      => $_POST['lbmcoilno'],
            "email"                         => $_POST['email'],
            "coilgrade"                         => $_POST['coilgrade'],
            "footage"                     => $_POST['footage'],
            "date"                          => $_POST['date'],
            "tagfrossweight"                       => $_POST['tagfrossweight'],
            "tagnetweight"                          => $_POST['tagnetweight'],
            "gauge"                         => $_POST['gauge'],
            "color"                         => $_POST['color'],
            "gauge"                         => $_POST['gauge'],
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
        
        $gaugement = $connection->prepare($sql);
        $gaugement->execute($new_ticket);
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
        <label for="vendorcoilno">Vendor Coil #</label>
      </div>
      <div class="col-75">
        <input type="text" name="vendorcoilno" id="vendorcoilno" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lbmcoilno">LBM Coil #</label>
      </div>
      <div class="col-75">
        <input type="text" name="lbmcoilno" id="lbmcoilno" required>
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
        <label for="tagfrossweight">tagfrossweight</label>
      </div>
      <div class="col-75">
        <input type="text" name="tagfrossweight" id="tagfrossweight" >
      </div>
    </div>
	      <div class="row">
      <div class="col-25">
        <label for="tagnetweight">tagnetweight</label>
      </div>
      <div class="col-75">
        <input type="text" name="tagnetweight" id="tagnetweight" >
      </div>
    </div>
	  	      <div class="row">
      <div class="col-25">
        <label for="gauge">gauge</label>
      </div>
      <div class="col-75">
        <input type="text" name="gauge" id="gauge" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="coilgrade">coilgrade Number</label>
      </div>
      <div class="col-75">
        <input type="tel" name="coilgrade" id="coilgrade">
      </div>
    </div>
	  <div class="row">
      <div class="col-25">
        <label for="footage">Footage</label>
      </div>
      <div class="col-75">
        <input type="tel" name="footage" id="footage">
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
		<input type="date" name="date1" value="" min="<?php echo date("Y-m-d"); ?>" required><input type="text" id="length1" size="40" name="length1" value="" placeholder="Length" /><input type="text" id="desc1" size="40" name="desc1" value="" placeholder="Description" />
    </p>
		      <p>
		<input type="date" name="date2" value="" min="<?php echo date("Y-m-d"); ?>" required><input type="text" id="length2" size="40" name="length1" value="" placeholder="Length" /><input type="text" id="desc2" size="40" name="desc2" value="" placeholder="Description" />
    </p>
		      <p>
		<input type="date" name="date3" value="" min="<?php echo date("Y-m-d"); ?>" required><input type="text" id="length3" size="40" name="length3" value="" placeholder="Length" /><input type="text" id="desc3" size="40" name="desc3" value="" placeholder="Description" />
    </p>
		      <p>
		<input type="date" name="date4" value="" min="<?php echo date("Y-m-d"); ?>" required><input type="text" id="length4" size="40" name="length4" value="" placeholder="Length" /><input type="text" id="desc4" size="40" name="desc_new" value="" placeholder="Description" />
    </p>
		      <p>
		<input type="date" name="date5" value="" min="<?php echo date("Y-m-d"); ?>" required><input type="text" id="length5" size="40" name="length5" value="" placeholder="Length" /><input type="text" id="desc5" size="40" name="desc5" value="" placeholder="Description" />
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
