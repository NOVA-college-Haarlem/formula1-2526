<?php

//search.php verwerking
if(isset($_GET['zoekterm']) && !empty($_GET['zoekterm'])){

    if(isset($_GET['soort'])){
        $soort = $_GET['soort'];

        switch ($soort) {
            case 'voornaam':
                $soort = 'forename';
                break;
            case 'achternaam':
                $soort = 'surname';
                break;
            default:
                $soort = 'id';
                break;
        }
        $zoekterm = $_GET['zoekterm'];
        
        require 'database.php';
        
        $sql = "SELECT * FROM drivers WHERE $soort LIKE '$zoekterm%' ";
        $result = mysqli_query($conn, $sql);
        $drivers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    foreach($drivers as $driver):
        echo "<div>";
        echo $driver['forename'] . " " . $driver['surname'];

        echo "</div>";

    endforeach;

}

//search advanced.php verwerking
if(isset($_GET['zoekveld']) && !empty($_GET['zoekveld'])){

    if(strlen($_GET['zoekveld']) > 2 ){

        $zoekveld = $_GET['zoekveld']; //max
        $orderby = "";

        if(isset($_GET['sorteer'])){

            $sorteer = $_GET['sorteer'];

            switch ($sorteer) {
                case 'voornaam':
                    $orderby =  "ORDER BY forename ASC";
                    break;
                case 'achternaam':
                    $orderby =   "ORDER BY surname ASC";
                    break;
                case 'nationaliteit':
                    $orderby =  "ORDER BY nationality ASC";
                    break;
                
                default:
                    $orderby = "";
                    break;
            }

        }

            
    
        require 'database.php';
        $sql = "SELECT * FROM drivers WHERE 
                                    forename LIKE '%$zoekveld%' OR
                                    surname LIKE '%$zoekveld%' OR
                                    nationality LIKE '%$zoekveld%' 
                                    $orderby
                                    ";

        $result = mysqli_query($conn, $sql);
        $drivers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>voornaam</th>
                <th>achternaam</th>
                <th>nationaliteit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($drivers as $driver): ?>
                <tr>
                    <td><?php echo $driver['forename']?></td>
                    <td><?php echo $driver['surname']?></td>
                    <td><?php echo $driver['nationality']?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>
</html>