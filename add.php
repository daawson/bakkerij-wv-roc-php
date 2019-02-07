<?php
    include "database.php";
    if(isset($_GET['edit'])){
        if($_GET['edit'] == "add") {

            $bn = htmlentities($_GET['name'], ENT_QUOTES, 'utf-8');
            $bt = htmlentities($_GET['type'], ENT_QUOTES, 'utf-8');
            $bc = htmlentities($_GET['count'], ENT_QUOTES, 'utf-8');
            $bw = htmlentities($_GET['weight'], ENT_QUOTES, 'utf-8');

            $sql = "INSERT INTO breads (breadname, breadtype, breadcount, breadweight)
        VALUES ('".$bn."','". $bt ."','". $bc ."' , '". $bw ." ')";        // Prepare statement

            $dbh->exec($sql);
            header("Location: index.php");

        }
        else if($_GET['edit'] == "cancel"){
            header("Location: index.php");
        }
    }
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <h1>Voeg brood toe: </h1>
        <form action="add.php" method="get">
            <label>Broodnaam:
                <input type="text" name="name">
            </label><br>
            <label>Brood type:
                <input type="text" name="type">
            </label><br>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             </q>
            <label>Aantaal:
                <input type="number" name="count">
            </label><br>
            <label>Gewicht:
                <input type="number" name="weight">
            </label><br>
            <input type="submit" name="edit" value="add">
            <input type="submit" name="edit" value="cancel">
        </form>
    </body>
</html>
