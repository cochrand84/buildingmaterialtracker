<?php
require "includes/header.php";
include "includes/password_protect.php"; 

if (isset($_POST['submit'])) {
    try  {
        
        require "includes/config.php";
        require "includes/common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM tickets WHERE NOT (status = 'complete') ORDER by date ASC";

        $location = $_POST['location'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

        
<?php  
if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) { ?>
        <h2>Results</h2>

<?php require "includes/readtable.php"; ?>

    <?php } else { ?>
        <blockquote>No results found for <?php echo escape($_POST['status']); ?>.</blockquote>
    <?php } 
} 
?>


<?php
if (isset($_POST['submit2'])) {
    try  {
        
        require "includes/config.php";
        require "includes/common.php";


        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT *  FROM tickets ORDER by date ASC";

        $location = $_POST['location'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
        
<?php  
if (isset($_POST['submit2'])) {
    if ($result && $statement->rowCount() > 0) { ?>
        <h2>Results</h2>

<?php require "includes/readtable.php"; ?>

    <?php } else { ?>
        <blockquote>No results found for <?php echo escape($_POST['status']); ?>.</blockquote>
    <?php } 
} ?> 

<?php
if (isset($_POST['submit3'])) {
    try  {
        
        require "includes/config.php";
        require "includes/common.php";


        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM tickets WHERE (status = 'complete') ORDER by date ASC";

        $location = $_POST['location'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
        
<?php  
if (isset($_POST['submit3'])) {
    if ($result && $statement->rowCount() > 0) { ?>
        <h2>Results</h2>

<?php require "includes/readtable.php"; ?>

    <?php } else { ?>
        <blockquote>No results found for <?php echo escape($_POST['status']); ?>.</blockquote>
    <?php } 
} ?> 

<?php
if (isset($_POST['submit4'])) {
    try  {
        
        require "includes/config.php";
        require "includes/common.php";


        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT *  FROM tickets ORDER by date ASC";

        $location = $_POST['location'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
        
<?php  
if (isset($_POST['submit4'])) {
    if ($result && $statement->rowCount() > 0) { ?>
        <h2>Results</h2>

<?php require "includes/readalltable.php"; ?>

    <?php } else { ?>
        <blockquote>No results found for <?php echo escape($_POST['status']); ?>.</blockquote>
    <?php } 
} ?> 

<h2>Select your view option</h2>

<form method="post">
    <input type="submit" name="submit" value="View non-Complete">
    <input type="submit" name="submit2" value="View all">
    <input type="submit" name="submit3" value="View Complete">
    <input type="submit" name="submit4" value="View all data">
</form>

<?php require "includes/footer.php"; ?>
