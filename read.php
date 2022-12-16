<?php
// Maak een verbiendeing met mysql-server en database
require('config.php');
// Maak een database sourcename string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "De verbiending is gelukt";
    } else {
        echo "Interne server-error";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
// Maak een select query die alle records uit de tabel persoon haalt
$sql = "SELECT * FROM Persoon";
// maak via de sql-query gereed om te worden uitgevoerd op de database
$statement = $pdo->prepare($sql);
// voer de sql-query uit op de database
$statement->execute();
//zet het resultaat in een array met daarin de objecten(records ui de tabel persoon)
$result = $statement->fetchAll(PDO::FETCH_OBJ);
// even checken war we treugkrijgen
// var_dump($result);
$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->Id</td>
                <td>$info->Voornaam</td> 
                <td>$info->Tussenvoegsel</td>
                <td>$info->Achternaam</td>
                <td>$info->Haarkleur</td>
                <td>$info->Oogkleur</td>
                <td>$info->Huidkleur</td>
            //     <td>
            //         <a href='delete.php?Id=$info->Id'>
            //             <img src='img/b_drop.png' alt='kruis'>
            //         </a>
            //     </td>
            //     <td>
            //     <a href='update.php?Id=$info->Id'>
            //         <img src='img/b_edit.png' alt='potlood'>
            //         </a>
            //     </td>
             </tr>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Persoonsgegevens</h3>
    <a href="index.php">
        <input type="button" value="Nieuw record">
    </a>
    <br>
    <br>
    <table border="1">
        <thead>
            <!-- <th>Id</th> -->
            <th>Naam</th>
            <th>Vermogen</th>
            <th>Leeftijd</th>
            <th>Bedrijf</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?= $rows; ?>
        </tbody>
    </table>
</body>

</html>