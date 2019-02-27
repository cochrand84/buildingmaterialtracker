<?php
include "password_protect.php"; 

if (isset($_POST['verup'])) {
    try  {
        
        require "../includes/config.php";
        require "../includes/common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM `vertracker` WHERE 1 ORDER by ver ASC";

        $location = $_POST['location'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();

        if ($result && $statement->rowCount() > 0) {
        foreach ($result as $row) { 
                    $ver                         = $row["ver"]; }                   
        } else { 
        echo $_POST['status'];
        } 
        $increase = "0.0.1";
        $newver = $ver + $increase;
        $dataTime = date("Y-m-d H:i:s");

            try  {
        $connection = new PDO($dsn, $username, $password, $options);
        $new_ver = array(
            "ver"                       => $newver,
            "date_time"                 => $dataTime
        );   

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "vertracker",
                implode(", ", array_keys($new_ver)),
                ":" . implode(", :", array_keys($new_ver))
        );
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_ver);
        echo "The version is now";
        echo $newver;
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }


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