<?php
require_once"../components/logincheck.php";
require_once"../components/helpers.php";
require_once "db/db.php";
?>

  <html lang="en">
    <?php require "../components/head.php"; ?>

  <body>
    <?php require "../components/header.php";

    ?>

    <div class="container">
      <table class="table table-bordered">
        <tr>
          <th>Пользователь(логин)</th>
          <th>Имя</th>
          <th>возраст</th>
          <th>описание</th>
          <th>Действия</th>
        </tr>

        <?php
        $query = 'SELECT * FROM users';
        $result = $mysqli->query($query);
        while ($row = $result->fetch_array()) {
            echo "<tr>";
            echo "<td>{$row['login']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['age']}</td>";
            echo "<td>{$row['description']}</td>";
            //echo "<td><img src='../registration/pictures/{$row['picture']}'></td>";
            echo "<td><a id=\"{$row['login']}\" onclick=\"return DeleteEntry(this.id);\">Remove user</a></td>";
            echo "</tr>";
        }
        ?>
      </table>

    </div><!-- /.container -->
    <script>
        function DeleteEntry(id) {
            if(confirm("Are you sure you want to delete this row?"))
                window.location="delete.php?del="+id;
            return false;
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  </body>

  </html>
