

<head>
	<link rel="stylesheet" href="css/print.css">
	<script type="text/javascript">
 window.onload = function() { window.print(); }
</script>
	</head>

<?php
include "includes/password_protect.php"; 

/**
 * Use an HTML form to create a new entry in the
 * tickets table.
 *
 */

$_GET['editid'];
$incommingid = $_GET['editid'];

try  {
        
        require "includes/config.php"; 
        require "includes/common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM `tickets` WHERE (ID = $incommingid)";

        $location = $_POST['location'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
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

?>

<h2>Ticket no. <?php echo $editid; ?></h2>

<table style="width:100%">
	<tr>
		
            <td>Ticket ID</td>

            <td><?php echo $editid; ?></td>
            
    </tr>
    <tr>

            <td>First Name</td>

            <td><?php echo $editfirstname; ?></td>

            <td>Last Name</td>

            <td><?php echo $editlastname; ?></td>
    </tr>
    <tr>

            <td>Phone Number</td>

            <td><?php echo $editphone; ?></td>

            <td>Cell Phone</td>

            <td><?php echo $editcellphone; ?></td>
    </tr>
    <tr>
 
            <td>Date</td>

            <td><?php echo $editdate; ?></td>

            <td>Status</td>

            <td><?php echo $editstatus; ?></td>
    </tr>
            
</table>

<table style="width:90%">
    <tr>
        
            <td>Color</td>

            <td><?php echo $editcolor; ?></td>
            
    </tr>
    <tr>

            <td>Gauge</td>

            <td><?php echo $editgauge; ?></td>

            <td>Delivery Date</td>

            <td><?php echo $editdel; ?></td>
    </tr>
    <tr>

            <td>Pickup Time</td>

            <td><?php echo $editpickuptime; ?></td>

            <td>Invoice No.</td>

            <td><?php echo $editinvoicen; ?></td>
    </tr>            
</table>

<table style="width:90%">
    <tr>

            <td>Qty</td>

            <td><?php echo $editqty1; ?></td>

            <td>Length</td>

            <td><?php echo $editlength1; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc1; ?></td>

    </tr>  
        <tr>

            <td>Qty</td>

            <td><?php echo $editqty2; ?></td>

            <td>Length</td>

            <td><?php echo $editlength2; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc2; ?></td>

    </tr>   
        <tr>

            <td>Qty</td>

            <td><?php echo $editqty3; ?></td>

            <td>Length</td>

            <td><?php echo $editlength3; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc3; ?></td>

    </tr>   
        <tr>

            <td>Qty</td>

            <td><?php echo $editqty4; ?></td>

            <td>Length</td>

            <td><?php echo $editlength4; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc4; ?></td>

    </tr>    
        <tr>

            <td>Qty</td>

            <td><?php echo $editqty5; ?></td>

            <td>Length</td>

            <td><?php echo $editlength5; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc5; ?></td>

    </tr>    
        <tr>

            <td>Qty</td>

            <td><?php echo $editqty6; ?></td>

            <td>Length</td>

            <td><?php echo $editlength6; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc6; ?></td>

    </tr> 
        <tr>

            <td>Qty</td>

            <td><?php echo $editqty7; ?></td>

            <td>Length</td>

            <td><?php echo $editlength7; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc7; ?></td>

    </tr> 
        <tr>

            <td>Qty</td>

            <td><?php echo $editqty8; ?></td>

            <td>Length</td>

            <td><?php echo $editlength8; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc8; ?></td>

    </tr> 

        <tr>

            <td>Qty</td>

            <td><?php echo $editqty9; ?></td>

            <td>Length</td>

            <td><?php echo $editlength9; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc9; ?></td>

    </tr> 
        <tr>

            <td>Qty</td>

            <td><?php echo $editqty10; ?></td>

            <td>Length</td>

            <td><?php echo $editlength10; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc10; ?></td>

    </tr> 
        <tr>

            <td>Qty</td>

            <td><?php echo $editqty11; ?></td>

            <td>Length</td>

            <td><?php echo $editlength11; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc11; ?></td>

            <td>Image</td>

            <td><?php echo Image11; ?></td>

    </tr> 
            <tr>

            <td>Qty</td>

            <td><?php echo $editqty12; ?></td>

            <td>Length</td>

            <td><?php echo $editlength12; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc12; ?></td>

            <td>Image</td>

            <td><?php echo Image12; ?></td>

    </tr>
            <tr>

            <td>Qty</td>

            <td><?php echo $editqty13; ?></td>

            <td>Length</td>

            <td><?php echo $editlength13; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc13; ?></td>

            <td>Image</td>

            <td><?php echo Image13; ?></td>

    </tr>
            <tr>

            <td>Qty</td>

            <td><?php echo $editqty14; ?></td>

            <td>Length</td>

            <td><?php echo $editlength14; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc14; ?></td>

            <td>Image</td>

            <td><?php echo Image14; ?></td>

    </tr>
            <tr>

            <td>Qty</td>

            <td><?php echo $editqty15; ?></td>

            <td>Length</td>

            <td><?php echo $editlength15; ?></td>

            <td>Discription</td>

            <td><?php echo $editdesc15; ?></td>

            <td>Image</td>

            <td><?php echo Image15; ?></td>

    </tr>
</table>

<table style="width:90%">
            
    <tr>
            
            </br>
			<td>Ticket Number:</td>

			<td><img alt="Ticket Number" src="barcode.php?text=<?php echo $editid; ?>&print=true" /></td>

			<td>Coil Number 1</td>

			<td><img alt="Coil 1" src="barcode.php?text=<?php echo $editcoil1; ?>&print=true" /></td>

            <td>Coil Number 2</td>

            <td><img alt="Coil 2" src="barcode.php?text=<?php echo $editcoil2; ?>&print=true" /></td>

    </tr>
    </table>
    </html>


