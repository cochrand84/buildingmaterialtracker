<?php
include "password_protect.php"; 

if (isset($_POST['verup'])) {
    try  {
        
        require "../includes/config.php";
        require "../includes/common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM tickets WHERE NOT (status = 'complete') ORDER by due_date ASC";

        $location = $_POST['location'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}


if (isset($_POST['dropalltables'])) {
    try  {
        
        require "../includes/config.php";
        require "../includes/common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "EXEC tickets 'ALTER TABLE ? NOCHECK CONSTRAINT all'";

        $statement = $connection->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_POST['installtables'])) {
    
        
        include "install.php";

    
}

?>

<form method="post">
    <input type="submit" name="verup" value="verup">
    <input type="submit" name="dropalltables" value="dropalltables">
    <input type="submit" name="installtables" value="installtables">
</form>