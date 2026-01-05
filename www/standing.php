<?php

require 'database.php';

$sql = "SELECT * FROM drivers 
            JOIN driver_standing 
                ON drivers.driverId = driver_standing.driverId";

$result = mysqli_query($conn, $sql);
$standings = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($standings as $standing):?>
        <div>
            <h2><?php echo $standing['forename'] . ' ' . $standing['surname']; ?></h2>
            <p>Points: <?php echo $standing['points']; ?></p>
            <p>Position: <?php echo $standing['position']; ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>