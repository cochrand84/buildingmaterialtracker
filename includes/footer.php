</body>
<?php

require "config.php";

$connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM `vertracker` WHERE 1 ORDER by ver ASC";

        $location = $_POST['location'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();

        if ($result && $statement->rowCount() > 0) {
        foreach ($result as $row) { 
                    $ver                         = $row["ver"]; 
                    $verdate					 = $row["date_time"];
                }                   
        } else { 
        echo $_POST['status'];
        } 

        ?>
</br>
</br>
</br>
</br>

<a href="includes/password_protect.php?logout=1" class="linkbutton">Logout</a>
<a href="admin/admin.php" class="linkbutton">Admin Area</a>
<a href="index.php" class="linkbutton">Back to home</a>
<a href="ticket.php" class="linkbutton">Create a new ticket</a>
<a href="coil.php" class="linkbutton">Coil weight and Footage Chart</a>
<a href="opentickets.php" class="linkbutton">show open tickets</a>

Version <?php echo $ver; ?> built on <?php echo $verdate; ?> UTC

</br>
</br>


</html>