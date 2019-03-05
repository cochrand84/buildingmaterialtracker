<?php

/**
 * Use an HTML form to create a new entry in the
 * tickets table.
 *
 */

require "includes/header.php";
include "includes/password_protect.php"; 

$_GET['searchvalue'];
$incommingid = $_GET['searchvalue'];

    try  {
        
        require "includes/config.php";
        require "includes/common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM tickets WHERE '$incommingid' IN (coil1, coil2, lastname)";

        $location = $_POST['location'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

    if ($result && $statement->rowCount() > 0) { ?>
        <h2>Results</h2>

<?php require "includes/readtable.php"; ?>

    <?php } else { ?>
        <blockquote>No results found for <?php echo $incommingid; ?>.</blockquote>
    <?php } ?>

<?php require "includes/footer.php"; ?>
