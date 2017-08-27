<?php
$config = include 'db/config.php';
?>

    <!DOCTYPE html>
    <html lang="en">
        <?php require "components/head.php"; ?>
    <body>
        <?php require "../components/header.php"; ?>
        
    <div class="form-container">
        <form class="form-horizontal" action="validation.php">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" name="login" placeholder="Логин">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" name="password" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Войти</button>
              <br><br>
              Нет аккаунта? <a href="reg.php">Зарегистрируйтесь</a>
            </div>
          </div>
        </form>
      </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>

    </html>