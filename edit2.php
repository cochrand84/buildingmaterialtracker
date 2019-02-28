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
                    $editid                         = $row["id"]; 
                    $editfirstname                  = $row["firstname"]; 
                    $editlastname                   = $row["lastname"]; 
                    $editaddress                      = $row["address"]; 
                    $editcity                       = $row["city"]; 
                    $editstate                   = $row["state"]; 
                    $editdate                       = $row["date"]; 
                    $editstatus                     = $row["status"];
                    $editphone                      = $row["phone"];
                    $editdate                    = $row["date"];
                   
         } 
        } else { 
        echo $_POST['status'];
     } 

if (isset($_POST['submitedit'])) {

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
            
            $editedfirstname                        = $_POST['firstname'];
            $editedlastname                         = $_POST['lastname'];
            $editedaddress                            = $_POST['address'];
            $editedphone                            = $_POST['phone'];
            $editedcity                             = $_POST['city'];
            $editedstate                         = $_POST['state'];
            $editedstatus                           = $_POST['status'];
            $editedcolor                             = $_POST['color'];
            $editeddate                         = $_POST['date'];
           

         $sql = "UPDATE `tickets` SET `firstname` = '$editedfirstname', `lastname` = '$editedlastname', `address` = '$editedaddress', `phone` = '$editedphone', `city` = '$editedcity', `state` = '$editedstate', `status` = '$editedstatus', `color` = '$editedcolor', `model` = '$editedmodel', `date` = '$editeddate'
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
            <label for="vin">Ticket ID</label>
        </div>
        <div class="col-75">
            <input type="text" id="ticketid" value="<?php echo $editid; ?>" name="ticketid" maxlength="255" required/>
        </div>
    </div>   
    <div class="row">    
        <div class="col-25">
            <label for="firstname">First Name</label>
        </div>
        <div class="col-75">
            <input type="text" name="firstname" id="firstname" value="<?php echo $editfirstname; ?>" required>
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
            <label for="address">address Address</label>
        </div>
        <div class="col-75">
            <input type="text" name="address" id="address" value="<?php echo $editaddress; ?>">
        </div>
    </div>    
    <div class="row">     
        <div class="col-25">
            <label for="phone">Phone Number</label>
        </div>
        <div class="col-75">
            <input type="text" name="phone" id="phone" value="<?php echo $editphone; ?>" required> 
        </div>
    </div>    
    <div class="row">     
        <div class="col-25">   
            <label for="state">state</label>
        </div>
        <div class="col-75">
            <select name="state" id="state" required>
            <option value="<?php echo $editstate; ?>" selected><?php echo $editstate; ?></option>

            </select><br />
        </div>
    </div>    
    <div class="row">     
        <div class="col-25">
            <label for="due_date">Due Date</label>
        </div>
        <div class="col-25">
            <input type="date" name="due_date" value="<?php echo $editduedate; ?>" required>
        </div>
    </div>    
    <div class="row">     
        <div class="col-25">
            <label for="status">Status</label>
        </div>
        <div class="col-75">
            <select name="status" required>
            <option value="<?php echo $editstatus; ?>" selected><?php echo $editstatus; ?></option>

            </select><br />
        </div>
    </div>    

    <div class="row">
        <input type="submit" name="submitedit" value="Submit Edit">
    </div>
        </form>

        <h2>Create a new ticket</h2>
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
    </select>
      
    </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="coil1">Coil 1</label>
      </div>
      <div class="col-75">
          
    <select id="coil1" name="coil1" value="<?php echo $editcoil1; ?>">
      <option value="717341055-3">717341055-3</option>
      <option value="31">31</option>
    </select>
      
    </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="coil2">Coil 2</label>
      </div>
      <div class="col-75">
          
    <select id="coil2" name="coil2" value="<?php echo $editcoil2; ?>">
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
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</div>

<?php require "includes/footer.php"; ?>
