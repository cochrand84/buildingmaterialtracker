<?php

/**
 * Use an HTML form to create a new entry in the
 * tickets table.
 *
 */

require "includes/header.php";
include "includes/password_protect.php"; 

$_GET['editid'];
$incommingid = $_GET['editid'];

try  {
        
        require "includes/config.php"; 
        require "includes/common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM `tickets` WHERE (ID = $incommingid)";

        $state = $_POST['state'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':state', $state, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

if ($result && $statement->rowCount() > 0) {
        foreach ($result as $row) { 
            $editid                             = $row["id"]; 
            $editfirstname                      = $row["firstname"]; 
            $editlastname                       = $row["lastname"]; 
            $editaddress                        = $row["address"]; 
            $editcity                           = $row["city"]; 
            $editstate                          = $row["state"]; 
            $editdate                           = $row["date"]; 
            $editstatus                         = $row["status"];
            $editphone                          = $row["phone"];
            $editdate                           = $row["date"];
            $editcellphone                      = $row["cellphone"];
            $editcolor                          = $row["color"];
            $editgauge                          = $row["gauge"];
            $editcoil1                          = $row["coil1"]; 
            $editcoil2                          = $row["coil2"];
            $editdel                            = $row["del"];
            $editpickuptime                     = $row["pickuptime"];
            $editqty1                           = $row["qty1"];
            $editlength1                        = $row["length1"];
            $editdesc1                          = $row["desc1"];
            $editqty2                           = $row["qty2"];
            $editlength2                        = $row["length2"];
            $editdesc2                          = $row["desc2"];
            $editqty3                           = $row["qty3"];
            $editlength3                        = $row["length3"];
            $editdesc3                          = $row["desc3"];
            $editqty4                           = $row["qty4"];
            $editlength4                        = $row["length4"];
            $editdesc4                          = $row["desc4"];
            $editqty5                           = $row["qty5"];
            $editlength5                        = $row["length5"];
            $editdesc5                          = $row["desc5"];                   
         } 
        } else { 
        echo $_POST['status'];
     } 

if (isset($_POST['submitedit'])) {

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
            
            $editedfirstname                     = $_POST['firstname'];
            $editedlastname                      = $_POST['lastname'];
            $editedaddress                       = $_POST['address'];
            $editedphone                         = $_POST['phone'];
            $editedcity                          = $_POST['city'];
            $editedstate                         = $_POST['state'];
            $editedstatus                        = $_POST['status'];
            $editedcolor                         = $_POST['color'];
            $editeddate                          = $_POST['date'];
            $editedcellphone                     = $_POST['cellphone'];
            $editedgauge                         = $_POST['gauge'];
            $editedcoil1                         = $_POST['coil1']; 
            $editedcoil2                         = $_POST['coil2'];
            $editeddel                           = $_POST['del'];
            $editedpickuptime                    = $_POST['pickuptime'];
            $editedqty1                          = $_POST['qty1'];
            $editedlength1                       = $_POST['length1'];
            $editeddesc1                         = $_POST['desc1'];
            $editedqty2                          = $_POST['qty2'];
            $editedlength2                       = $_POST['length2'];
            $editeddesc2                         = $_POST['desc2'];
            $editedqty3                          = $_POST['qty3'];
            $editedlength3                       = $_POST['length3'];
            $editeddesc3                         = $_POST['desc3'];
            $editedqty4                          = $_POST['qty4'];
            $editedlength4                       = $_POST['length4'];
            $editeddesc4                         = $_POST['desc4'];
            $editedqty5                          = $_POST['qty5'];
            $editedlength5                       = $_POST['length5'];
            $editeddesc5                         = $_POST['desc5'];
           

         $sql = "UPDATE `tickets` SET `firstname` = '$editedfirstname', `lastname` = '$editedlastname', `address` = '$editedaddress', `phone` = '$editedphone', `city` = '$editedcity', `state` = '$editedstate', `status` = '$editedstatus', `color` = '$editedcolor', `date` = '$editeddate'
         WHERE `id` = '$editid';";

        $statement = $connection->prepare($sql);
        $statement->execute($editdata);
        echo "<meta http-equiv='refresh' content='0'>";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_POST['submitedit']) && $statement) { ?>
    <blockquote><?php echo $_POST['id']; ?> successfully edited.</blockquote>
<?php } ?>

        <h2>Edit a ticket</h2>
<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="firstname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" name="firstname" id="firstname" value="<?php echo $editfirstname; ?>"required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lastname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" name="lastname" id="lastname" value="<?php echo $editlastname; ?>"required>
      </div>
    </div>
      <div class="row">
      <div class="col-25">
        <label for="date">Date</label>
      </div>
      <div class="col-75">
        <input type="date" name="date" value="<?php echo $editdate; ?>" min="<?php echo date("Y-m-d"); ?>" required>
      </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="address">Address</label>
      </div>
      <div class="col-75">
        <input type="text" name="address" id="address" value="<?php echo $editaddress; ?>">
      </div>
    </div>
          <div class="row">
      <div class="col-25">
        <label for="city">City</label>
      </div>
      <div class="col-75">
        <input type="text" name="city" id="city" value="<?php echo $editcity; ?>">
      </div>
    </div>
              <div class="row">
      <div class="col-25">
        <label for="state">State</label>
      </div>
      <div class="col-75">
        <input type="text" name="state" id="state" value="<?php echo $editstatus; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone">Phone Number</label>
      </div>
      <div class="col-75">
        <input type="tel" name="phone" id="phone"value="<?php echo $editphone; ?>">
      </div>
    </div>
      <div class="row">
      <div class="col-25">
        <label for="cellphone">Cell Number</label>
      </div>
      <div class="col-75">
        <input type="tel" name="cellphone" id="cellphone"value="<?php echo $editcellphone; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="color">Color</label>
      </div>
      <div class="col-75">
          
    <select id="color" name="color" value="<?php echo $editedcolor; ?>">
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
          
    <select id="gauge" name="gauge" value="<?php echo $editgauge; ?>">
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
        <input type="checkbox" name="del" id="del" value="<?php echo $editdel; ?>">
      </div>
    </div>
          <div class="row">
      <div class="col-25">
        <label for="pickuptime">Pick-up Time</label>
      </div>
      <div class="col-75">
        <input type="text" name="pickuptime" id="pickuptime"value="<?php echo $editpickuptime; ?>">
      </div>
    </div>
      <div id="addinput">
    <p>
        <input type="text" id="qty1" size="20" name="qty1" value="<?php echo $editqty1; ?>" placeholder="Qty" /><input type="text" id="length1" size="40" name="length1" value="<?php echo $editlength1; ?>" placeholder="Length" /><input type="text" id="desc1" size="40" name="desc1" value="<?php echo $editdesc1; ?>" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
              <p>
        <input type="text" id="qty2" size="20" name="qty2" value="<?php echo $editqty2; ?>" placeholder="Qty" /><input type="text" id="length2" size="40" name="length1" value="<?php echo $editlength2; ?>" placeholder="Length" /><input type="text" id="desc2" size="40" name="desc2" value="<?php echo $editdesc2; ?>" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
              <p>
        <input type="text" id="qty3" size="20" name="qty3" value="<?php echo $editqty3; ?>" placeholder="Qty" /><input type="text" id="length3" size="40" name="length3" value="<?php echo $editlength3; ?>" placeholder="Length" /><input type="text" id="desc3" size="40" name="desc3" value="<?php echo $editdesc3; ?>" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
              <p>
        <input type="text" id="qty4" size="20" name="qty4" value="<?php echo $editqty4; ?>" placeholder="Qty" /><input type="text" id="length4" size="40" name="length4" value="<?php echo $editlength4; ?>" placeholder="Length" /><input type="text" id="desc4" size="40" name="desc4" value="<?php echo $editdesc4; ?>" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
              <p>
        <input type="text" id="qty5" size="20" name="qty5" value="<?php echo $editqty5; ?>" placeholder="Qty" /><input type="text" id="length5" size="40" name="length5" value="<?php echo $editlength5; ?>" placeholder="Length" /><input type="text" id="desc5" size="40" name="desc5" value="<?php echo $editdesc5; ?>" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
</div>
    <div class="row">
      <input type="submit" name="submitedit" value="submit edit">
    </div>
  </form>
</div>

<?php require "includes/footer.php"; ?>
