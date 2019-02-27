<?php
include "password_protect.php"; 

if (isset($_POST['verup'])) {
    try  {
        
        require "../includes/config.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM `vertracker` WHERE 1 ORDER by ver ASC";

        $location = $_POST['location'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();

        if ($result && $statement->rowCount() > 0) {
        $ver = "0.05";
        foreach ($result as $row) { 
                    $ver                         = $row["ver"]; }                   
        } else { 
        echo $_POST['status'];
        } 
        $increase = "0.01";
        $newver = $ver + $increase;
        echo $increase;
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
        echo $ver;
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

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "DROP DATABASE admin_lakeside";

        $statement = $connection->prepare($sql);
        $statement->execute();
        echo "Database droped successfully";
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