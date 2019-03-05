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
            $editqty6                           = $row["qty6"];
            $editlength6                        = $row["length6"];
            $editdesc6                          = $row["desc6"];
            $editqty7                           = $row["qty7"];
            $editlength7                        = $row["length7"];
            $editdesc7                          = $row["desc7"];
            $editqty8                           = $row["qty8"];
            $editlength8                        = $row["length8"];
            $editdesc8                          = $row["desc8"];
            $editqty9                           = $row["qty9"];
            $editlength9                        = $row["length9"];
            $editdesc9                          = $row["desc9"];
            $editqty10                           = $row["qty10"];
            $editlength10                        = $row["length10"];
            $editdesc10                          = $row["desc10"]; 
            $editqty11                           = $row["qty11"];
            $editlength11                        = $row["length11"];
            $editdesc11                          = $row["desc11"];
            $editqty12                           = $row["qty12"];
            $editlength12                        = $row["length12"];
            $editdesc12                          = $row["desc12"];
            $editqty13                           = $row["qty13"];
            $editlength13                        = $row["length13"];
            $editdesc13                          = $row["desc13"];
            $editqty14                           = $row["qty14"];
            $editlength14                        = $row["length14"];
            $editdesc14                          = $row["desc14"];
            $editqty15                           = $row["qty15"];
            $editlength15                        = $row["length15"];
            $editdesc15                          = $row["desc15"];
            $editinvoicen                       = $row["invoiceno"];
            $editnotes                          = $row["notes"];                  
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
            $editedqty6                          = $_POST['qty6'];
            $editedlength6                       = $_POST['length6'];
            $editeddesc6                         = $_POST['desc6'];
            $editedqty7                          = $_POST['qty7'];
            $editedlength7                       = $_POST['length7'];
            $editeddesc7                         = $_POST['desc7'];
            $editedqty8                          = $_POST['qty8'];
            $editedlength8                       = $_POST['length8'];
            $editeddesc8                         = $_POST['desc8'];
            $editedqty9                          = $_POST['qty9'];
            $editedlength9                       = $_POST['length9'];
            $editeddesc9                         = $_POST['desc9'];
            $editedqty10                         = $_POST['qty10'];
            $editedlength10                       = $_POST['length10'];
            $editeddesc10                         = $_POST['desc10'];
            $editedqty11                          = $_POST['qty11'];
            $editedlength11                       = $_POST['length11'];
            $editeddesc11                         = $_POST['desc11'];
            $editedqty12                          = $_POST['qty12'];
            $editedlength12                       = $_POST['length12'];
            $editeddesc12                         = $_POST['desc12'];
            $editedqty13                          = $_POST['qty13'];
            $editedlength13                       = $_POST['length13'];
            $editeddesc13                         = $_POST['desc13'];
            $editedqty14                          = $_POST['qty14'];
            $editedlength14                       = $_POST['length14'];
            $editeddesc14                         = $_POST['desc14'];
            $editedqty15                          = $_POST['qty15'];
            $editedlength15                       = $_POST['length15'];
            $editeddesc15                         = $_POST['desc15'];
            $editedinvoicen                       = $_POST['invoiceno'];
            $editednotes                          = $_POST['notes'];  
           

         $sql = "UPDATE `tickets` SET `firstname` = '$editedfirstname', `lastname` = '$editedlastname', `address` = '$editedaddress', `phone` = '$editedphone', `city` = '$editedcity', `state` = '$editedstate', `status` = '$editedstatus', `color` = '$editedcolor', `date` = '$editeddate', `cellphone` = '$editedcellphone', `gauge` = '$editedgauge', `coil1` = '$editedcoil1', `coil2` = '$editedcoil2', `del` = '$editeddel', `pickuptime` = '$editedpickuptime', `qty1` = '$editedqty1', `length1` = '$editedlength1', `desc1` = '$editeddesc1', `qty2` = '$editedqty2', `length2` = '$editedlength2', `desc2` = '$editeddesc2',`qty3` = '$editedqty3', `length3` = '$editedlength3', `desc3` = '$editeddesc3', `qty4` = '$editedqty4', `length4` = '$editedlength4', `desc4` = '$editeddesc4', `qty5` = '$editedqty5', `length5` = '$editedlength5', `desc5` = '$editeddesc5', `qty6` = '$editedqty6', `length6` = '$editedlength6', `desc6` = '$editeddesc6', `qty7` = '$editedqty7', `length7` = '$editedlength7', `desc7` = '$editeddesc7', `qty8` = '$editedqty8', `length8` = '$editedlength8', `desc8` = '$editeddesc8', `qty9` = '$editedqty9', `length9` = '$editedlength9', `desc9` = '$editeddesc9', `qty10` = '$editedqty10', `length10` = '$editedlength10', `desc10` = '$editeddesc10',`qty11` = '$editedqty11', `length11` = '$editedlength11', `desc11` = '$editeddesc11',`qty12` = '$editedqty12', `length12` = '$editedlength12', `desc12` = '$editeddesc12',`qty13` = '$editedqty13', `length13` = '$editedlength13', `desc13` = '$editeddesc13', `qty14` = '$editedqty14', `length14` = '$editedlength14', `desc14` = '$editeddesc14', `qty15` = '$editedqty15',`length15` = '$editedlength15',`desc15` = '$editeddesc15', `invoiceno` = '$editedinvoiceno', `notes` = '$editednotes'                        
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
        <input type="text" name="state" id="state" value="<?php echo $editstate; ?>">
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
          
<input type="text" name="coil1" id="coil1" value="<?php echo $editcoil1; ?>">
      
    </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="coil2">Coil 2</label>
      </div>
      <div class="col-75">
          
<input type="text" name="coil2" id="coil2" value="<?php echo $editcoil1; ?>">
      
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
        <input type="text" name="pickuptime" id="pickuptime" value="<?php echo $editpickuptime; ?>">
      </div>
    </div>
        <div class="row">
      <div class="col-25">
        <label for="invoiceno">Invoice No</label>
      </div>
      <div class="col-75">
        <input type="text" name="invoiceno" id="invoiceno" value="<?php echo $editinvoiceno; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="notes">Notes</label>
      </div>
      <div class="col-75">
        <input type="text" name="notes" id="notes" value="<?php echo $editnotes; ?>">
      </div>
    </div>
      <div id="addinput">
    <p>
        <input type="text" id="qty1" size="20" name="qty1" value="<?php echo $editqty1; ?>" placeholder="Qty" /><input type="text" id="length1" size="40" name="length1" value="<?php echo $editlength1; ?>" placeholder="Length" /><input type="text" id="desc1" size="40" name="desc1" value="<?php echo $editdesc1; ?>" placeholder="Description" />
    </p>
              <p>
        <input type="text" id="qty2" size="20" name="qty2" value="<?php echo $editqty2; ?>" placeholder="Qty" /><input type="text" id="length2" size="40" name="length2" value="<?php echo $editlength2; ?>" placeholder="Length" /><input type="text" id="desc2" size="40" name="desc2" value="<?php echo $editdesc2; ?>" placeholder="Description" />
    </p>
              <p>
        <input type="text" id="qty3" size="20" name="qty3" value="<?php echo $editqty3; ?>" placeholder="Qty" /><input type="text" id="length3" size="40" name="length3" value="<?php echo $editlength3; ?>" placeholder="Length" /><input type="text" id="desc3" size="40" name="desc3" value="<?php echo $editdesc3; ?>" placeholder="Description" />
    </p>
              <p>
        <input type="text" id="qty4" size="20" name="qty4" value="<?php echo $editqty4; ?>" placeholder="Qty" /><input type="text" id="length4" size="40" name="length4" value="<?php echo $editlength4; ?>" placeholder="Length" /><input type="text" id="desc4" size="40" name="desc4" value="<?php echo $editdesc4; ?>" placeholder="Description" />
    </p>
              <p>
        <input type="text" id="qty5" size="20" name="qty5" value="<?php echo $editqty5; ?>" placeholder="Qty" /><input type="text" id="length5" size="40" name="length5" value="<?php echo $editlength5; ?>" placeholder="Length" /><input type="text" id="desc5" size="40" name="desc5" value="<?php echo $editdesc5; ?>" placeholder="Description" />
    </p>
        <p>
        <input type="text" id="qty6" size="20" name="qty6" value="<?php echo $editqty6; ?>" placeholder="Qty" /><input type="text" id="length6" size="40" name="length6" value="<?php echo $editlength6; ?>" placeholder="Length" /><input type="text" id="desc6" size="40" name="desc6" value="<?php echo $editdesc6; ?>" placeholder="Description" />
    </p>
              <p>
        <input type="text" id="qty7" size="20" name="qty7" value="<?php echo $editqty7; ?>" placeholder="Qty" /><input type="text" id="length7" size="40" name="length7" value="<?php echo $editlength7; ?>" placeholder="Length" /><input type="text" id="desc7" size="40" name="desc7" value="<?php echo $editdesc7; ?>" placeholder="Description" />
    </p>
              <p>
        <input type="text" id="qty8" size="20" name="qty8" value="<?php echo $editqty8; ?>" placeholder="Qty" /><input type="text" id="length8" size="40" name="length8" value="<?php echo $editlength8; ?>" placeholder="Length" /><input type="text" id="desc8" size="40" name="desc8" value="<?php echo $editdesc8; ?>" placeholder="Description" />
    </p>
              <p>
        <input type="text" id="qty9" size="20" name="qty9" value="<?php echo $editqty9; ?>" placeholder="Qty" /><input type="text" id="length9" size="40" name="length9" value="<?php echo $editlength9; ?>" placeholder="Length" /><input type="text" id="desc9" size="40" name="desc9" value="<?php echo $editdesc9; ?>" placeholder="Description" />
    </p>
              <p>
        <input type="text" id="qty10" size="20" name="qty10" value="<?php echo $editqty10; ?>" placeholder="Qty" /><input type="text" id="length10" size="40" name="length10" value="<?php echo $editlength10; ?>" placeholder="Length" /><input type="text" id="desc10" size="40" name="desc10" value="<?php echo $editdesc10; ?>" placeholder="Description" />
    </p>
        <p>
        <input type="text" id="qty11" size="20" name="qty11" value="<?php echo $editqty11; ?>" placeholder="Qty" /><input type="text" id="length11" size="40" name="length11" value="<?php echo $editlength11; ?>" placeholder="Length" /><input type="text" id="desc11" size="40" name="desc11" value="<?php echo $editdesc11; ?>" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
              <p>
        <input type="text" id="qty12" size="20" name="qty12" value="<?php echo $editqty12; ?>" placeholder="Qty" /><input type="text" id="length12" size="40" name="length12" value="<?php echo $editlength12; ?>" placeholder="Length" /><input type="text" id="desc12" size="40" name="desc12" value="<?php echo $editdesc12; ?>" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
              <p>
        <input type="text" id="qty13" size="20" name="qty13" value="<?php echo $editqty13; ?>" placeholder="Qty" /><input type="text" id="length13" size="40" name="length13" value="<?php echo $editlength13; ?>" placeholder="Length" /><input type="text" id="desc13" size="40" name="desc13" value="<?php echo $editdesc13; ?>" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
              <p>
        <input type="text" id="qty14" size="20" name="qty14" value="<?php echo $editqty14; ?>" placeholder="Qty" /><input type="text" id="length14" size="40" name="length14" value="<?php echo $editlength14; ?>" placeholder="Length" /><input type="text" id="desc14" size="40" name="desc14" value="<?php echo $editdesc14; ?>" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
              <p>
        <input type="text" id="qty15" size="20" name="qty15" value="<?php echo $editqty15; ?>" placeholder="Qty" /><input type="text" id="length15" size="40" name="length15" value="<?php echo $editlength15; ?>" placeholder="Length" /><input type="text" id="desc5" size="40" name="desc5" value="<?php echo $editdesc15; ?>" placeholder="Description" /><?php include "includes/draw.php"; ?>
    </p>
</div>
    <div class="row">
      <input type="submit" name="submitedit" value="submit edit">
    </div>
  </form>
</div>

<?php require "includes/footer.php"; ?>
