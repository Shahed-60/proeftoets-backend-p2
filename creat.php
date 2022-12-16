<?php

// var_dump($_POST);
// echo $_POST['firstname'] . ' '. $_POST['infix'] . ' ' . $_POST['lastname'];

// we gaan contact maken met de mysql server
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    // var_dump( $pdo);
    if ($pdo) {
        echo "Er is een verbiending met de mysql-server";
    } else {
        echo "Er is een interne server-error, neem contact op met de beheerder";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
//we gaan een instert-query maken voor het wegschrijven van de formuliergegevens
$sql = "INSERT INTO Persoon (Id
                            ,Naam
                            ,Vermogen
                            ,Leeftijd
                            ,Bedrijf
                            )
        VALUES              (NULL
                            ,:Naam
                            ,:Vermogen
                            ,:Leeftijd
                            ,:Bedrijf
                            );";
//we bereiden de sql-query voor met de method prepare
$statement = $pdo->prepare($sql);

$statement->bindValue(':naam',$_POST['naam'], PDO::PARAM_STR);
$statement->bindValue(':vermogen',$_POST['vermogen'], PDO::PARAM_STR);
$statement->bindValue(':leeftijd',$_POST['leeftijd'], PDO::PARAM_STR);
$statement->bindValue(':haarkleur',$_POST['bedrijf'],PDO::PARAM_STR);


//we vuren de sql-query af op de database
$statement->execute();

if ($result) {
    echo "Er is een nieuw record gemaakt in de database.";
    header('Refresh:2; url=read.php');
} else {
    echo "Er is geen nieuw record gemaakt.";
    header('Refresh:2; url=read.php');
}