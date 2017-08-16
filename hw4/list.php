<?php
require_once "./registration/db/db.php";x
?>

  <html lang="en">
    <?php require "components/head.php"; ?>

  <body>
    <?php require "components/header.php"; ?>

    <div class="container">
      <h1>Запретная зона, доступ только авторизированному пользователю</h1>
      <h2>Информация выводится из базы данных</h2>

      <table class="table table-bordered">
        <tr>
          <th>Пользователь(логин)</th>
          <th>Имя</th>
          <th>возраст</th>
          <th>описание</th>
          <th>Фотография</th>
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
            echo "<td><img src='registration/pictures/{$row['picture']}'></td>";
            echo "<td><a href='https://yandex.ru'>Remove user</a></td>";
            echo "</tr>";
        }
        ?>
      </table>

    </div><!-- /.container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>

  </html>
