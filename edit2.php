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
        
            $editedvin                              = $_POST['vin'];
            $editedfirstname                        = $_POST['firstname'];
            $editedlastname                         = $_POST['lastname'];
            $editedaddress                            = $_POST['address'];
            $editedphone                            = $_POST['phone'];
            $editedcity                             = $_POST['city'];
            $editedstate                         = $_POST['state'];
            $editedstatus                           = $_POST['status'];
            $editedcolor                             = $_POST['color'];
            $editedmodel                            = $_POST['Model'];
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
            <label for="vin">VIN</label>
        </div>
        <div class="col-75">
            <input type="text" id="vin" value="<?php echo $editvin; ?>" name="vin" maxlength="17" required/>
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
</div>

<?php require "includes/footer.php"; ?>
