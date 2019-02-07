<?php
    include "database.php";
    if(isset($_GET['edit'])){
        if($_GET['edit'] == "add") {

            $bn = $_GET['name'];
            $bt = $_GET['type'];
            $bc = $_GET['count'];
            $bw = $_GET['weight'];

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
<body>
<form action="add.php" method="get">
    <label>Broodnaam:
        <input type="text" name="name">
    </label>
    <label>Brood type:
        <input type="text" name="type">
    </label>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </q>
    <label>Aantaal:
        <input type="number" name="count">
    </label>
    <label>Gewicht:
        <input type="number" name="weight">
    </label>
    <input type="submit" name="edit" value="add">
    <input type="submit" name="edit" value="cancel">
</form>
</body>
</html>
