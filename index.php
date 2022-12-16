<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon (2).ico" type="image/x-icon">
    <title>PHP PDO CRUD</title>
</head>

<body>
    <h1>De Vijf rijskte mensen ter wereld</h1>
    <form action="create.php" method="post">

        <label for="naam">Naam</label><br>
        <input type="text" name="naam" id="naam"><br>
        <br>
        <label for="vermogen">Vermogen</label><br>
        <input type="text" name="vermogen" id="vermogen"><br>
        <br>
        <label for="leeftijd">Leeftijd</label><br>
        <input type="text" name="leeftijd" id="leeftijd"><br>
        <br>
        <label for="mycompany">Bedrijf</label><br>
        <input type="text" name="mycompany" id="mycompany"><br>
        <br>

        <input type="submit" value="Verstuur!">


    </form>
</body>

</html>