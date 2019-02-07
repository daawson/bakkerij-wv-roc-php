<?php
    include "database.php";
    $target = htmlentities($_GET['id'], ENT_QUOTES, 'utf-8');
    $stmt = $dbh->prepare("SELECT breadname, breadtype, breadcount, breadweight FROM breads WHERE id='".$target."'");
    $stmt->execute();
    $row = $stmt->fetch();

    if(isset($_GET['edit'])) {
        $bid = $_GET['id'];
        $bname = htmlentities($_GET['name'], ENT_QUOTES, 'utf-8');
        $btype = htmlentities($_GET['type'], ENT_QUOTES, 'utf-8');
        $bcount = htmlentities($_GET['count'], ENT_QUOTES, 'utf-8');
        $bweight = htmlentities($_GET['weight'], ENT_QUOTES, 'utf-8');

        if($_GET['edit'] == "save") {
            $sql = "UPDATE breads SET breadname='".$bname."', breadtype='".$btype."', breadcount='".$bcount."', breadweight='".$bweight."' WHERE id='".$bid."'";

            // Prepare statement
            $stmt = $dbh->prepare($sql);

            // execute the query
            $stmt->execute();
            header("Location: index.php");

        }
        else if($_GET['edit'] == 'remove'){
            $stmt = $dbh->prepare( "DELETE FROM breads WHERE id =:id" );
            $stmt->bindParam(':id', $bid);
            $stmt->execute();
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
        <h1>Wijzig brood data: </h1>
        <form action="edit.php" method="get">
                <input type="hidden" name="id" value="<?php echo $target?>">
                <label>Brood naam:
                    <input type="text" name="name" value="<?php echo $row['breadname'] ?>">
                </label><br>
                <label>Brood type:
                    <input type="text" name="type" value="<?php echo $row['breadtype'] ?>">
                </label>   <br>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  </q>
                <label>Aantal:
                    <input type="number" name="count" value="<?php echo $row['breadcount'] ?>">
                </label><br>
                <label>Gewicht:
                    <input type="number" name="weight" value="<?php echo $row['breadweight'] ?>">
                </label><br>
                <input type="submit" name="edit" value="save">
                <input type="submit" name="edit" value="remove">
                <input type="submit" name="edit" value="cancel">
        </form>
    </body>
</html>
