<!DOCTYPE html>
<html lang="en">
    <?php require "components/head.php"; ?>

  <body>
    <?php include "components/header.php"; ?>

    <div class="container">

      <div class="form-container">
        <form class="form-horizontal" action="registration/validation.php" method="post" accept-charset="UTF-8">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Логин" name="login">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль" name="password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword4" class="col-sm-2 control-label" >Пароль (Повтор)</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword4" placeholder="Пароль" name="password2">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Зарегистрироваться</button>
              <br><br>
              Зарегистрированы? <a href="index.php">Авторизируйтесь</a>
            </div>
          </div>
        </form>
      </div>

    </div><!-- /.container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
