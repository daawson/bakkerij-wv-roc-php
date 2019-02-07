<?php
    include_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>hueuhue</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Overzicht</h1>
    <a href="add.php">Voeg brood toe</a>
    <?php
            $stmt = $dbh->prepare("SELECT id, breadname, breadtype, breadcount, breadweight FROM breads");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            echo "<table id='overzicht'>";
            echo "<tr><th>ID</th><th>Brood naam</th><th>Brood type</th><th>Aantal</th><th>Gewicht</th></tr>";
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
