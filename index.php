<?php
    include_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bakkerij</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Bakkerij Wim - Overzicht
    <br>
        <a href="add.php">Voeg brood toe</a></h1>
    <?php
            $stmt = $dbh->prepare("SELECT id, breadname, breadtype, breadcount, breadweight FROM breads");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            echo "<table id='overzicht'>";
            echo "<tr><th>ID</th><th>Brood naam</th><th>Brood type</th><th>Aantal</th><th>Gewicht</th><th></th></tr>";
            foreach($stmt->fetchAll() as $item){
                echo "<tr><td><p>".$item['id']."<p></td>";
                echo "<td><p>".$item['breadname']."<p></td>";
                echo "<td><p>".$item['breadtype']."<p></td>";
                echo "<td><p>".$item['breadcount']."<p></td>";
                echo "<td><p>".$item['breadweight']."<p></td>";
                echo "<td><a href='edit.php?id=".$item['id']."'>Wijzig</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
</body>
</html>
