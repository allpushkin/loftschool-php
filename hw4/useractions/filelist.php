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
        <table style="margin-top: 10px;" class="table table-bordered">
            <tr>
                <th>Название файла</th>
                <th>Фотография</th>
                <th>Действия</th>
            </tr>

            <?php
            $directory = 'pictures/';
            $scannedDirectory = array_values(array_diff(scandir($directory), ['..', '.', '.DS_Store', 'default.jpg']));
            $counter = 0;

                while ($counter < count($scannedDirectory)) {
                    echo "<tr>";
                    $name = $scannedDirectory[$counter];
                    echo "<td>$name</td>";
                    echo "<td><img src=\"pictures/$name\" /></td>";
                    echo "<td><a name='$name' id='delete'>Delete picture</a></td>";
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

        if (document.getElementById('delete')) {
            var del = document.getElementById('delete');

            del.addEventListener("click", function (e) {
                var name = "name=" + e.target.name;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "deletepic.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send(name);
                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        alert(this.responseText);
                    }
                }
            });
        };
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>
