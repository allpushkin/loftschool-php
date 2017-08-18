<?php
require_once"../components/logincheck.php";
require_once"../components/helpers.php";
require_once "db/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php require "../components/head.php"; ?>

<body>
<?php require "../components/header.php"; ?>

<div class="container">
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>Название файла</th>
                <th>Фотография</th>
                <th>Действия</th>
            </tr>

            <?php
            $directory = 'pictures/';
            $scannedDirectory = array_diff(scandir($directory), array('..', '.', '.DS_Store', 'default.jpg'));
            $counter = 0;

                while ($counter < count($scannedDirectory)) {
                    echo "<tr>";
                    $name = $scannedDirectory[$counter+4];
                    echo "<td>$name</td>";
                    echo "<td><img src=\"pictures/$name\" /></td>";
                    echo "<td><a name='$name' onclick=\"return DeleteEntry(this.name);\">Delete picture</a></td>";
                    echo "</tr>";
                    $counter++;
                }
            ?>
        </table>

    </div><!-- /.container -->

    <script>
        function DeleteEntry(id) {
            if (confirm("Are you sure you want to delete this row?"))
                window.location = "deletepic.php?del=" + id;
            return false;
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>
