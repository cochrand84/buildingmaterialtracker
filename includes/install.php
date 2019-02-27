<?php
include "includes/password_protect.php";
/**
 * Open a connection via PDO to create a
 * new database and table with structure.
 *
 */

require "includes/config.php";

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);
    
    echo "Database and table tickets created successfully.";
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
