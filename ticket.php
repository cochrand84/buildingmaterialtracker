<?php
require "includes/header.php";
include "includes/password_protect.php"; 

if (isset($_POST['submit'])) {

    require "includes/config.php";
    require "includes/common.php";  

	try  {
        $connection = new PDO($dsn, $username, $password, $options);
        $vinuppercase = strtoupper($VIN);
        $new_user = array(
            "vin"                       => $vinuppercase,
            "firstname"                 => $_POST['firstname'],
            "lastname"                  => $_POST['lastname'],
            "email"                     => $_POST['email'],
            "phone"                     => $_POST['phone'],
            "year"                      => $ModelYear,
            "location"                  => $_POST['location'],
            "status"                    => $_POST['status'],
            "make"                      => $Make,
            "model"                     => $Model,
            "due_date"                  => $_POST['due_date'],
            "image1"                    => $rand,
            "image2"                    => $rand2,
            "image3"                    => $rand3,
            "image4"                    => $rand4,
            "description"               => $_POST['description'],
            "oilchange"                 => $_POST['oilchange'],
            "fullservice"               => $_POST['fullservice'],
            "otherservice"              => $_POST['otherservice'],
            "otherservicedescription"   => $_POST['otherservicedescription'],
            "fronttirechange"           => $_POST['fronttirechange'],
            "reartirechange"            => $_POST['reartirechange'],
            "audiotroubleshooting"      => $_POST['audiotroubleshooting'],
            "otheraudiodescription"     => $_POST['otheraudiodescription'],
            "fullaudiosystem"           => $_POST['fullaudiosystem'],
            "audioupgrade"              => $_POST['audioupgrade']
        );   

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "tickets",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    
}

?>

<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>       
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
		<input type="text" id="qty_new" size="20" name="qty" value="" placeholder="Qty" /><input type="text" id="length_new" size="40" name="length" value="" placeholder="Length" /><input type="text" id="desc_new" size="40" name="desc_new" value="" placeholder="Description" />
    </p>
		      <p>
		<input type="text" id="qty_new" size="20" name="qty" value="" placeholder="Qty" /><input type="text" id="length_new" size="40" name="length" value="" placeholder="Length" /><input type="text" id="desc_new" size="40" name="desc_new" value="" placeholder="Description" />
    </p>
		      <p>
		<input type="text" id="qty_new" size="20" name="qty" value="" placeholder="Qty" /><input type="text" id="length_new" size="40" name="length" value="" placeholder="Length" /><input type="text" id="desc_new" size="40" name="desc_new" value="" placeholder="Description" />
    </p>
		      <p>
		<input type="text" id="qty_new" size="20" name="qty" value="" placeholder="Qty" /><input type="text" id="length_new" size="40" name="length" value="" placeholder="Length" /><input type="text" id="desc_new" size="40" name="desc_new" value="" placeholder="Description" />
    </p>
		      <p>
		<input type="text" id="qty_new" size="20" name="qty" value="" placeholder="Qty" /><input type="text" id="length_new" size="40" name="length" value="" placeholder="Length" /><input type="text" id="desc_new" size="40" name="desc_new" value="" placeholder="Description" />
    </p>
</div>
    <div class="row">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>