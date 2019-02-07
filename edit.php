<?php
    include "database.php";
    $target = $_GET["id"];
    $stmt = $dbh->prepare("SELECT breadname, breadtype, breadcount, breadweight FROM breads WHERE id='".$target."'");
    $stmt->execute();
    $row = $stmt->fetch();

    if(isset($_GET['edit'])) {
        $bid = $_GET['id'];
        $bname = $_GET['name'];
        $btype = $_GET['type'];
        $bcount = $_GET['count'];
        $bweight = $_GET['weight'];

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
    <body>
        <form action="edit.php" method="get">
            <input type="hidden" name="id" value="<?php echo $target?>">
            <label>Broodnaam:
                <input type="text" name="name" value="<?php echo $row['breadname'] ?>">
            </label>
            <label>Brood type:
                <input type="text" name="type" value="<?php echo $row['breadtype'] ?>">
            </label>    <q>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     </q>
            <label>Aantaal:
                <input type="number" name="count" value="<?php echo $row['breadcount'] ?>">
            </label>
            <label>Gewicht:
                <input type="number" name="weight" value="<?php echo $row['breadweight'] ?>">
            </label>
            <input type="submit" name="edit" value="save">
            <input type="submit" name="edit" value="remove">
            <input type="submit" name="edit" value="cancel">
        </form>
    </body>
</html>
