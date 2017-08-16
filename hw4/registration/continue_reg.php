<?php
require_once "./registration/db/db.php";

print_r($_POST);

?>

    <!DOCTYPE html>
    <html lang="en">
        <?php require "../components/head.php";?>

    <body>
        <?php require "../components/header.php";?>

    <div class="form-container">
        <form class="form-horizontal" action="registration.php">
        <h2 class="form-group">Example heading</h2>
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="login" placeholder="Логин">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="age" placeholder="Возраст">
            </div>
            <div class="form-group">
                <textarea type="number" rows="4" class="form-control" id="description" placeholder="О себе"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Зарегистрироваться</button>
            </div>
        </form>
      </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>

    </html>
