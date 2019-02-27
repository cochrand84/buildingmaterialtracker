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
        echo "The version is now ";
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
  
        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "DROP DATABASE admin_lakeside";

        $statement = $connection->prepare($sql);
        $statement->execute();
        echo "Database dropped successfully";
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_POST['installtables'])) {
    
        
        include "install.php";

    
}

if (isset($_POST['refreshdatabase'])) {
    try  {
        require "../includes/config.php";
        $connection = new PDO($dsn, $username, $password, $options);

        $sql1 = "SELECT * FROM `vertracker` WHERE 1 ORDER by ver ASC";

        $location = $_POST['location'];

        $statement1 = $connection->prepare($sql1);
        $statement1->bindParam(':location', $location, PDO::PARAM_STR);
        $statement1->execute();

        $result1 = $statement1->fetchAll();

        if ($result1 && $statement1->rowCount() > 0) {
        foreach ($result1 as $row) { 
                    $ver                         = $row["ver"]; }                   
        } else { 
        echo $_POST['status'];
        } 

        $sql2 = "DROP DATABASE admin_lakeside";

        $statement2 = $connection->prepare($sql2);
        $statement2->execute();

        try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);
    
    echo "Database and table tickets created successfully.";
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}


        $sql3 = "INSERT INTO vertracker (ver) VALUES ($ver)";

        $statement3 = $connection->prepare($sql3);
        $statement3->execute();

        echo "Database refreshed successfully";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<form method="post">
    <input type="submit" name="verup" value="verup">
    <input type="submit" name="dropalltables" value="dropalltables">
    <input type="submit" name="installtables" value="installtables">
    <input type="submit" name="refreshdatabase" value="refreshdatabase">
</form>