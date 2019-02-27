</body>
<?php

require "config.php";
require "common.php";

$connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT 1 FROM vertracker";

        $location = $_POST['location'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();

        ?>
</br>
</br>
</br>
</br>

<a href="templates/password_protect.php?logout=1" class="linkbutton">Logout</a>
<a href="index.php" class="linkbutton">Back to home</a>
<a href="ticket.php" class="linkbutton">Create a new ticket</a>
<a href="coil.php" class="linkbutton">Coil weight and Footage Chart</a>

</br>
</br>


</html>